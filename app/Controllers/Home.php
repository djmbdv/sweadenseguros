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
        $paises = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Palestina","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");
        $polizas = $polizaModel->findAll();
        return view('welcome_message',["paises"=> $paises, "polizas" => $polizas]);

    }
    public function login(){
        return view('login');
    }

    public function poliza($polizaId){
        $polizaModel = new \App\Models\PolizaModel();
        $paises = array("Afganistán","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Arabia Saudita","Argelia","Argentina","Armenia","Australia","Austria","Azerbaiyán","Bahamas","Bangladés","Barbados","Baréin","Bélgica","Belice","Benín","Bielorrusia","Birmania","Bolivia","Bosnia y Herzegovina","Botsuana","Brasil","Brunéi","Bulgaria","Burkina Faso","Burundi","Bután","Cabo Verde","Camboya","Camerún","Canadá","Catar","Chad","Chile","China","Chipre","Ciudad del Vaticano","Colombia","Comoras","Corea del Norte","Corea del Sur","Costa de Marfil","Costa Rica","Croacia","Cuba","Dinamarca","Dominica","Ecuador","Egipto","El Salvador","Emiratos Árabes Unidos","Eritrea","Eslovaquia","Eslovenia","España","Estados Unidos","Estonia","Etiopía","Filipinas","Finlandia","Fiyi","Francia","Gabón","Gambia","Georgia","Ghana","Granada","Grecia","Guatemala","Guyana","Guinea","Guinea ecuatorial","Guinea-Bisáu","Haití","Honduras","Hungría","India","Indonesia","Irak","Irán","Irlanda","Islandia","Islas Marshall","Islas Salomón","Israel","Italia","Jamaica","Japón","Jordania","Kazajistán","Kenia","Kirguistán","Kiribati","Kuwait","Laos","Lesoto","Letonia","Líbano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Madagascar","Malasia","Malaui","Maldivas","Malí","Malta","Marruecos","Mauricio","Mauritania","México","Micronesia","Moldavia","Mónaco","Mongolia","Montenegro","Mozambique","Namibia","Nauru","Nepal","Nicaragua","Níger","Nigeria","Noruega","Nueva Zelanda","Omán","Países Bajos","Pakistán","Palaos","Palestina","Panamá","Papúa Nueva Guinea","Paraguay","Perú","Polonia","Portugal","Reino Unido","República Centroafricana","República Checa","República de Macedonia","República del Congo","República Democrática del Congo","República Dominicana","República Sudafricana","Ruanda","Rumanía","Rusia","Samoa","San Cristóbal y Nieves","San Marino","San Vicente y las Granadinas","Santa Lucía","Santo Tomé y Príncipe","Senegal","Serbia","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka","Suazilandia","Sudán","Sudán del Sur","Suecia","Suiza","Surinam","Tailandia","Tanzania","Tayikistán","Timor Oriental","Togo","Tonga","Trinidad y Tobago","Túnez","Turkmenistán","Turquía","Tuvalu","Ucrania","Uganda","Uruguay","Uzbekistán","Vanuatu","Venezuela","Vietnam","Yemen","Yibuti","Zambia","Zimbabue");
        $polizas = $polizaModel->findAll();
        $poliza = $polizaModel->find($polizaId);
        return view('welcome_message',["paises"=> $paises, "polizas" => $polizas, "poliza"=>$poliza]);
    }
    public function save(){
        $polizaModel = new \App\Models\PolizaModel();
        $data = [
            "poliza" => $this->request->getVar('poliza'),
            "aplicacion" => $this->request->getVar('aplicacion'),
            "a_favor" => $this->request->getVar('a_favor'),
            "desde" => $this->request->getVar("desde"),
            "hasta" => $this->request->getVar("hasta"),
            "sobre" => $this->request->getVar("sobre"),
            "anunciado" => $this->request->getVar("anunciado"),
            "lugar" => $this->request->getVar("lugar"),
            "marca" => $this->request->getVar("marca"),
            "nos" => $this->request->getVar("nos"),
            "peso" => $this->request->getVar("lugar"),
            "bultos" => $this->request->getVar("bultos"),
            "contenido" => $this->request->getVar("contenido"),
            "asegurado" => $this->request->getVar("asegurado"),
            "porcentaje" => $this->request->getVar("observaciones"),
            "embarcado_por" => $this->request->getVar("embarcado_por"),
            "cscvs" => $this->request->getVar("cscvs"),
            "ssc" => $this->request->getVar("ssc"),
            "iva" => $this->request->getVar("iva"),
            "dde" => $this->request->getVar("dde")
        ];
        $p = $polizaModel->find($data["poliza"]);
        if(is_null($p))
            $k = $polizaModel->insert($data);
        else {
            $poliza = $this->request->getVar('poliza');
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
            "message"=>"Ingresado nuevo #".$data["poliza"],
            "k" => $data["poliza"]
        ];
        return $this->response->setJSON($r);
    }
    public function pdf1($polizaId){
        $polizaModel = new \App\Models\PolizaModel();
        $p = $polizaModel->find($polizaId);
        $pdf = new Fpdi();

        $pageCount = $pdf->setSourceFile(FCPATH.'formato_sweaden.pdf');
        $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);

        $pdf->addPage();
        $pdf->useTemplate($pageId,['adjustPageSize' => true]);
        $pdf->SetFont('Helvetica');
        $pdf->SetXY(30, 36);
        $pdf->SetFontSize(10);
        $pdf->Write(8, $p["poliza"]);
        $pdf->SetXY(260, 36);
        $pdf->Write(8, $p["aplicacion"]);
        $pdf->SetXY(200, 44);
        $pdf->Write(6, $p["a_favor"]);
        $pdf->SetXY(170, 50);
        $pdf->Write(6, $p["desde"]);
        $pdf->SetXY(30, 56);
        $pdf->Write(6, $p["hasta"]);
        $pdf->SetXY(180, 56);
        $pdf->Write(6, $p["sobre"]);
        $pdf->SetXY(45, 61);
        $pdf->Write(6, $p["anunciado"]);
        $pdf->SetXY(150, 67);
        $pdf->Write(6, $p["lugar"]);
        $pdf->SetFont('Times');
        $pdf->SetXY(15, 85);
        $pdf->Write(6, $p["marca"]);
        $pdf->SetXY(43, 85);
        $pdf->Write(6, $p["nos"]);
        $pdf->SetXY(59, 85);
        $pdf->Write(6, $p["peso"]);
        $pdf->SetXY(80, 85);
        $pdf->Write(6, $p["bultos"]);
        $pdf->SetXY(105, 85);
        $pdf->Write(6, $p["contenido"]);
        $pdf->SetXY(145, 85);
        $pdf->Write(6, $p["asegurado"]);
        $pdf->SetXY(186, 85);
        $pdf->Write(6, $p["porcentaje"]);
        $pdf->SetXY(202, 85);
        $pdf->Write(6, $p["porcentaje"]);
        $pdf->SetXY(232, 85);
        $pdf->Write(6, $p["observaciones"]);

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('I', 'generated.pdf');
    }

    public function pdf2($polizaId){
        $img_file = 'tempimg.png';

        $dataURI    = (new QRCode)->render("https://".base_url()."/verify/".md5($polizaId));
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
        
                $pdf->addPage();
                $pdf->useTemplate($pageId,['adjustPageSize' => true]);
                $pdf->SetXY(10, 10);
                $pdf->Image($img_file,null,null,20,20);
                $this->response->setHeader('Content-Type', 'application/pdf');
                $pdf->Output('I', 'u.pdf');

                //  Delete image from server
                unlink($img_file);
            }
        }

    }
    public function pdf3($polizaId){        $img_file = 'tempimg.png';

        $dataURI    = (new QRCode)->render("https://".base_url()."/verify/".md5($polizaId));
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
        $p = $polizaModel->where('md5(poliza)',$code)->first();
        print_r($p);
    }
}
