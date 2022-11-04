<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KodeAntrianModel;
use App\Models\KodeAntrianDataModel;
use Config\Services;

class KodeAntrian extends BaseController
{
    public function __construct()
    {
        $this->kode = new KodeAntrianModel();
    }

    public function index()
    {
        $data = ['title' => 'Kode Antrian'];

        return view('kodeAntrian/view', $data);
    }

    public function listData()
    {
        $request = Services::request();
        $datamodel = new KodeAntrianDataModel($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost('start');
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $btnPanggil = "<button class=\"btn btn-success btn-sm rounded-circle btnPanggil\" data-toggle=\"tooltip\" title=\"Panggil Kode\" onClick=\"panggilKodeAntrian($list->id_kode_antrian, '$list->kode_antrian')\" id=\"btnPanggil$list->id_kode_antrian\"><i class=\"fas fa-bell\"></i></i></button>";
                $btnHapus = "<button class=\"btn btn-danger btn-sm rounded\" data-toggle=\"tooltip\" title=\"Hapus Data\" onClick=\"deleteKodeAntrian($list->id_kode_antrian)\"><i class=\"fas fa-trash\"></i> Hapus</button>";

                $row[] = $no;
                $row[] = $list->kode_antrian;
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

    public function saveKodeAntrian()
    {
        if ($this->request->isAjax()) {

            $input = $this->request->getVar();
            $kode = $this->kode->where('kode_antrian', $input['kode_antrian'])->first();

            $data = [
                'kode_antrian' => $input['kode_antrian']
            ];

            if ($input['kode_antrian'] == '') {
                $msg = [
                    'icon' => 'error',
                    'title' => 'kode antrian belum diisi',
                ];
            } else if (empty($kode)) {
                $this->kode->insert($data);

                $msg = [
                    'data' => view('kodeAntrian/data', ['title' => 'Kode Antrian'])
                ];
            } else {
                $msg = [
                    'icon' => 'error',
                    'title' => 'Kode antrian sudah ada',
                ];
            }

            return $this->response->setJSON($msg);
        } else {
            return redirect()->back()->with('error', 'Forbidden');
        }
    }

    public function deleteKodeAntrian()
    {
        if ($this->request->isAjax()) {

            $id = $this->request->getVar('id');

            $this->kode->delete($id);

            $msg = [
                'data' => view('kodeAntrian/data', ['title' => 'Kode Antrian'])
            ];

            return $this->response->setJSON($msg);
        } else {
            return redirect()->back()->with('error', 'Forbidden');
        }
    }
}
