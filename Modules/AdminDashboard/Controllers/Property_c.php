<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\Property_m;
use Modules\AdminDashboard\Models\User_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Property_c extends BaseController
{
    public function index()
    {
        $propertyModel = new Property_m();
        $data['properties'] = $propertyModel->findAll();
        return view('property/index', $data);
    }

    public function tawaran_view($value='')
    {
        $propertyModel = new Property_m();
        $data['properties'] = $propertyModel->findAll();
        return view('property/tawaran_view', $data);
    }

    public function gen_tawaran()
    {
        $propertyModel = new Property_m();
        $data['property'] = $propertyModel->findAll();     

        $data['imageKPKM'] = base_url("assets/images/jata_moa.png");
        $data['imageMARDI'] = base_url("assets/images/mardi.png");
        $data['imageFooter'] = base_url("assets/images/footer_surat_cropped.png");   

        // Load the User_m model
        $userModel = new User_m();
        
        $nok_pemohon = '18163';
        $result_inteam = $userModel->inteam_get_user($nok_pemohon); // Use $userModel instead of $this->User_m        
        $data['result_inteam'] = $result_inteam;

        // Load the MpdfLibrary
        $mpdfLibrary = new MpdfLibrary();
        $mpdf = $mpdfLibrary->load();

        // Generate header and footer
        $header = view('layouts/surat/surat_header', ['section' => 'header', 'imageKPKM' => $data['imageKPKM'], 'imageMARDI' => $data['imageMARDI']]);
        $footer = view('layouts/surat/surat_footer', ['section' => 'footer', 'imageFooter' => $data['imageFooter']]);

        $mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLFooter($footer);

        // Generate main content
        $html = view('layouts/surat/surat_tawaran', ['section' => 'content'] + $data);

        $mpdf->WriteHTML($html);
        
        $pdfOutput = $mpdf->Output('', 'S');

        $response = $this->response->setHeader('Content-Type', 'application/pdf')
                                   ->setBody($pdfOutput);

        return $response;
    }


}
