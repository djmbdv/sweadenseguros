<?php

namespace App\Controllers;

use App\Models\Poliza;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Common\EccLevel;

class Home extends BaseController
{
    public function index()
    {
        $polizaModel = new \App\Models\PolizaModel();
        $paises = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Palestina","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Taiwan","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");
        $page = intval($_GET["page"] ?? "0") ;
        $polizas = $polizaModel->findAll(10, 10 * $page);
        
        return view('welcome_message',["paises"=> $paises, "polizas" => $polizas, "page" => $page]);

    }
    public function login(){
        return view('login');
    }

    public function poliza($polizaId){
        $polizaModel = new \App\Models\PolizaModel();
        $paises = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Palestina","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Taiwan","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");
        $poliza = $polizaModel->find($polizaId);
        $page = intval($_GET["page"] ?? "0") ;
        $polizas = $polizaModel->findAll(10, 10 * $page);
        return view('welcome_message',["paises"=> $paises, "polizas" => $polizas, "poliza"=>$poliza, "page" => $page]);
    }
    public function save(){
        $db = \Config\Database::connect();
        $polizaModel = new \App\Models\PolizaModel();
        $scaped =  $db->escapeString( $this->request->getVar("anunciado"));
        $data = [
            "poliza" => $this->request->getVar('poliza'),
            "aplicacion" => $this->request->getVar('aplicacion'),
            "a_favor" => $this->request->getVar('a_favor'),
            "desde" => $this->request->getVar("desde"),
            "hasta" => $this->request->getVar("hasta"),
            "sobre" => $this->request->getVar("sobre"),
            "anunciado" => $scaped,
            "lugar" => $this->request->getVar("lugar"),
            "marca" => $this->request->getVar("marca"),
            "nos" => $this->request->getVar("nos"),
            "peso" => $this->request->getVar("lugar"),
            "bultos" => $this->request->getVar("bultos"),
            "contenido" => $this->request->getVar("contenido"),
            "asegurado" => $this->request->getVar("asegurado"),
            "porcentaje" => $this->request->getVar("porcentaje"),
            "embarcado_por" => $this->request->getVar("embarcado_por"),
            "cscvs" => $this->request->getVar("cscvs"),
            "ssc" => $this->request->getVar("ssc"),
            "iva" => $this->request->getVar("iva"),
            "dde" => $this->request->getVar("dde"),
            "estado" => $this->request->getVar("estado"),
            "observaciones" => $this->request->getVar("observaciones")
        ];
        $p = $polizaModel->find($data["aplicacion"]);
        if(is_null($p))
            $k = $polizaModel->insert($data);
        else {
            $poliza = $this->request->getVar('aplicacion');
            $data = [
                "aplicacion" => $this->request->getVar('aplicacion'),
                "a_favor" => $this->request->getVar('a_favor'),
                "desde" => $this->request->getVar("desde"),
                "hasta" => $this->request->getVar("hasta"),
                "sobre" => $this->request->getVar("sobre"),
                "anunciado" => $this->request->getVar("anunciado"),
                "lugar" => $this->request->getVar("lugar"),
                "marca" => $this->request->getVar("marca"),
                "nos" => $this->request->getVar("nos"),
                "peso" => $this->request->getVar("peso"),
                "bultos" => $this->request->getVar("bultos"),
                "contenido" => $this->request->getVar("contenido"),
                "asegurado" => $this->request->getVar("asegurado"),
                "porcentaje" => $this->request->getVar("porcentaje"),
                "embarcado_por" => $this->request->getVar("embarcado_por"),
                "cscvs" => $this->request->getVar("cscvs"),
                "ssc" => $this->request->getVar("ssc"),
                "iva" => $this->request->getVar("iva"),
                "dde" => $this->request->getVar("dde"),
                "estado" => $this->request->getVar("estado"),
                "observaciones" => $this->request->getVar("observaciones")
            ];
            $k = $polizaModel->update($poliza,$data);
            $r = [
                "data"=> $data,
                "message"=>"guardado",
                "k" => $poliza
            ];
            return $this->response->setJSON($r);
        }
        $r = [
            "data"=> $data,
            "message"=>"Ingresado nuevo #".$data["aplicacion"],
            "k" => $data["aplicacion"]
        ];
        return $this->response->setJSON($r);
    }
    public function pdf1($polizaId){
        
        $img_file = 'tempimg.png';
        $img_file_v = uniqid().'.png';
        $dataURI    = (new QRCode)->render("FIRMADO POR SWEADEN");
        $dataPieces = explode(',',$dataURI);
        $dataURIV    = (new QRCode)->render(base_url()."/verify/".md5($polizaId));
        $dataPiecesV = explode(',',$dataURIV);
        $encodedImg = $dataPieces[1];
        $encodedImgV = $dataPiecesV[1];
        $decodedImg = base64_decode($encodedImg);
        $decodedImgV = base64_decode($encodedImgV);

        //  Check if image was properly decoded
        if( $decodedImg!==false && $decodedImgV )
        {
            //  Save image to a temporary location
            if( file_put_contents($img_file,$decodedImg)!==false && file_put_contents($img_file_v,$decodedImgV)!==false)
            {

        $polizaModel = new \App\Models\PolizaModel();
        $p = $polizaModel->find($polizaId);
        $pdf = new Fpdi();

        $pageCount = $pdf->setSourceFile(FCPATH.'formato_sweaden.pdf');
        $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $prima = $p["porcentaje"] * $p["asegurado"] / 100.0;


        $pdf->addPage();
        $pdf->useTemplate($pageId,['adjustPageSize' => true]);
        $pdf->SetXY(250, 158);
        $pdf->Image($img_file,null,null,20,20);
        $pdf->SetXY(55, 16);
        $pdf->Image($img_file_v,null,null,25,25);
        $pdf->SetFont('Helvetica');
        $pdf->SetXY(30, 36);
        $pdf->SetFontSize(10);
        $pdf->Write(6, str_pad($p['poliza'], 6, "0", STR_PAD_LEFT));
        $pdf->SetXY(260, 36);
        $pdf->Write(8, $p["aplicacion"]);
        $pdf->SetXY(147, 44);
        $pdf->Write(6, str_pad($p['poliza'], 6, "0", STR_PAD_LEFT));
        $pdf->SetXY(200, 44);
        $pdf->Write(6, $p["a_favor"]);
        $pdf->SetXY(170, 50);
        $pdf->Write(6,  iconv('UTF-8', 'ISO-8859-1', $p["desde"]));
        $pdf->SetXY(30, 56);
        $pdf->Write(6, iconv('UTF-8', 'ISO-8859-1', $p["hasta"]));
        $pdf->SetXY(180, 56);
        $pdf->Write(6, $p["sobre"]);
        $pdf->SetXY(45, 61);
        $pdf->Write(6, date("d/m/Y", strtotime( $p["anunciado"])));
        $pdf->SetXY(150, 61);
        $pdf->Write(6, $p["a_favor"]);
        $pdf->SetXY(150, 67);
        $pdf->Write(6, iconv('UTF-8', 'ISO-8859-1',$p["lugar"]));
        $pdf->SetFont('Courier');
        $pdf->SetFontSize(8);
        $pdf->SetXY(10, 85);
        $pdf->MultiCell(30,6,iconv('UTF-8', 'ISO-8859-1', $p["marca"]),0,'C');
        $pdf->SetXY(43, 85);
        $pdf->Cell(12,6, $p["nos"],0,1,'C');
        $pdf->SetXY(59, 85);
        $pdf->Cell(18,6, $p["peso"],0,1,'C');
        $pdf->SetXY(80, 85);
        $pdf->Cell(20,6, $p["bultos"],0,1,'C');
        $pdf->SetXY(105, 85);
        $pdf->SetFont('Helvetica');
        $pdf->SetFontSize(7);
        $pdf->MultiCell(30,6,"MERCADERIAS SEGUN FACTURA COMERCIAL\n\n".
         $p["contenido"].
         "\nMERCADERIAS EN GENERAL"
        );
        $pdf->SetFont('Courier');
        $pdf->SetFontSize(8);
        $pdf->SetXY(145, 85);
        $pdf->Cell(40,6, $p["asegurado"],0,1,'C');
        $pdf->SetXY(186, 85);
        $pdf->Write(6, "PRIMA");
        $pdf->SetXY(186, 91);
        $pdf->Write(6, "C.S.V.S");
        $pdf->SetXY(186, 97);
        $pdf->Write(6, "S.C.C");
        $pdf->SetXY(186, 103);
        $pdf->Write(6, "D.E.");
        $pdf->SetXY(186, 109);
        $pdf->Write(6, "IVA");
        $pdf->SetXY(186, 117);
        $pdf->SetFont("Courier","b");
        $pdf->Write(6, "TOTAL");
        $pdf->SetFont("Courier","");
        $pdf->SetXY(202, 85);
        $pdf->Cell(25,6, number_format($prima,2),0,1,'R');
        $pdf->SetXY(202, 91);
        $pdf->Cell(25,6,number_format($p['cscvs']*$prima,2),0,1,'R');
        $pdf->SetXY(202, 97);
        $pdf->Cell(25,6,number_format($p['ssc']*$prima,2),0,1,'R');
        $pdf->SetXY(202, 103);
        $pdf->Cell(25,6, number_format($p['dde'],2),0,1,'R');
        $pdf->SetXY(202, 109);
        $pdf->Cell(25,6, number_format($p['iva']*($prima + $p['dde'] + $p['ssc']*$prima + $p["cscvs"]*$prima),2),0,1,'R');
        $pdf->SetXY(202, 117);
        $pdf->SetFont("Courier","b");
        $pdf->Cell(25,6, number_format($p['iva']*($prima + $p['dde'] + $p['ssc']*$prima + $p["cscvs"]*$prima) +
         ($prima + $p['dde'] + $p['ssc']*$prima + $p["cscvs"]*$prima),2 ),0,1,'R');
        $pdf->SetFont("Helvetica","");
        $pdf->SetXY(232, 85);
        $pdf->Multicell(100,6, iconv('UTF-8', 'ISO-8859-1', $p["observaciones"]));
        $pdf->SetFont("Helvetica","b");
        $pdf->SetXY(50,146);
        $pdf->Write(6, $p["embarcado_por"]);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('I', 'poliza'.$p["poliza"].'.pdf');
                        //  Delete image from server
                        unlink($img_file);
                        unlink($img_file_v);
                    }
                }
    }

    public function pdf2($polizaId){
        $img_file = uniqid().'.png';

        $dataURI    = (new QRCode)->render(base_url()."/verify/".md5($polizaId));
        $dataPieces = explode(',',$dataURI);
        $encodedImg = $dataPieces[1];
        $decodedImg = base64_decode($encodedImg);

        //  Check if image was properly decoded
        if( $decodedImg!==false )
        {
            //  Save image to a temporary location
            if( file_put_contents($img_file,$decodedImg)!==false )
            {
                //  Open new PDF document and print image
                $polizaModel = new \App\Models\PolizaModel();
                $p = $polizaModel->find($polizaId);
                if(!isset($p["poliza"]))return;
                $pdf = new Fpdi();
        
                $pageCount = $pdf->setSourceFile(FCPATH.'pf.pdf');
                $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
                $pdf->SetFont('Helvetica');
                $pdf->addPage();
                $pdf->useTemplate($pageId,['adjustPageSize' => true]);
                $pdf->SetXY(10, 10);
                $pdf->Image($img_file,null,null,20,20);
                $pdf->SetXY(140, 48);
                $pdf->Write(4, $p["poliza"]);
                $this->response->setHeader('Content-Type', 'application/pdf');
                $pdf->Output('I', 'u.pdf');

                //  Delete image from server
                unlink($img_file);
            }
        }

    }
    public function pdf3($polizaId){        $img_file = 'tempimg.png';
        $dataURI    = (new QRCode)->render(base_url()."/verify/".md5($polizaId));
        $dataPieces = explode(',',$dataURI);
        $encodedImg = $dataPieces[1];
        $decodedImg = base64_decode($encodedImg);

        //  Check if image was properly decoded
        if( $decodedImg!==false )
        {
            //  Save image to a temporary location
            if( file_put_contents($img_file,$decodedImg)!==false )
            {
                //  Open new PDF document and print image
                
                $polizaModel = new \App\Models\PolizaModel();
                $p = $polizaModel->find($polizaId);
                if(!isset($p["poliza"]))return;
                $pdf = new Fpdi();
        
                $pageCount = $pdf->setSourceFile(FCPATH.'pr.pdf');
                $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        
                $pdf->addPage();
                $pdf->useTemplate($pageId,['adjustPageSize' => true]);
                $pdf->SetXY(16, 8);
                $pdf->Image($img_file,null,null,20,20);
                $this->response->setHeader('Content-Type', 'application/pdf');
                $pdf->Output('I', 'u.pdf');

                //  Delete image from server
                unlink($img_file);
            }
        }
    }
    public function polizas($pagination = 1){
        $polizaModel =  new \App\Models\PolizaModel();
        $polizas = $polizaModel->findAll();
 
    
         $this->response->setJSON(true);
        echo json_encode($polizas);
    }

    public function verify($code){
        $polizaModel = new \App\Models\PolizaModel();
        $p = $polizaModel->where('md5(aplicacion)',$code)->first();
        return view("validacion", ["poliza" => $p]);
    }
}
