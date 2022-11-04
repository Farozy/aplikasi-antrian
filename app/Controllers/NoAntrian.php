<?php

namespace App\Controllers;

use App\Models\NoAntrianModel;
use App\Models\NoAntrianDataModel;
use Config\Services;

class NoAntrian extends BaseController
{
    public function __construct()
    {
        $this->noAntrian = new NoAntrianModel();
    }

    public function index()
    {
        $data = ['title' => 'No Antrian'];

        return view('noAntrian/view', $data);
    }

    public function listData()
    {
        $request = Services::request();
        $datamodel = new NoAntrianDataModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost('start');
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $btnPanggil = "<button class=\"btn btn-success btn-sm rounded-circle btnPanggil\" data-toggle=\"tooltip\" title=\"Panggil No Antrian\" onClick=\"panggilNoAntrian($list->id_no_antrian, $list->no_antrian)\" id=\"btnPanggil$list->id_no_antrian\"><i class=\"fas fa-bell\"></i></i></button>";
                $btnHapus = "<button class=\"btn btn-danger btn-sm rounded\" data-toggle=\"tooltip\" title=\"Hapus Data\" onClick=\"deleteNoAntrian($list->id_no_antrian)\"><i class=\"fas fa-trash\"></i> Hapus</button>";

                $row[] = $no;
                $row[] = $list->no_antrian;
                $row[] = $btnPanggil;
                $row[] = $btnHapus;

                $row[] = '';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datamodel->count_all(),
                'recordsFiltered' => $datamodel->count_filtered(),
                'data' => $data,
            ];
            echo json_encode($output);
        }
    }

    public function ambilNoAntrian()
    {
        if ($this->request->isAjax()) {

            $noAntrian = $this->noAntrian->selectMax('no_antrian')->first();
            $hasilNoAntrian = implode($noAntrian);
            $hasilNoAntrian++;

            $this->noAntrian->insert(['no_antrian' => $hasilNoAntrian]);

            $msg = [
                'data' => view('noAntrian/data', ['title' => 'No Antrian'])
            ];

            return $this->response->setJSON($msg);
        } else {
            return redirect()->back()->with('error', 'Forbidden');
        }
    }

    public function paggilNoAntrian()
    {
        if( $this->request->isAjax() ) {

            $input = $this->request->getVar();

            $msg = [
                'data' => $input['no']
            ];

            return $this->response->setJSON($msg);
            
        } else {
            return redirect()->back()->with('error', 'Forbidden');
        }
    }

    public function deleteNoAntrian()
    {
        if( $this->request->isAjax() ) {

            $id = $this->request->getVar('id');

            $this->noAntrian->delete($id);

            $msg = [
                'data' => view('noAntrian/data', ['title' => 'No Antrian'])
            ];

            return $this->response->setJSON($msg);

        } else {
            return redirect()->back()->with('error', 'Forbidden');
        }
    }

    public function getPanggilan($no)
    {
        d($no);
    }
}
