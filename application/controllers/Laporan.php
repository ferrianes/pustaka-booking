<?php
defined('BASEPATH') or exit('No Direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Laporan extends CI_Controller {

    public function laporan_buku()
    {
        $data['judul'] = 'Laporan Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/laporan_buku', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_buku()
    {
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_Array();

        $this->load->view('buku/laporan_print_buku', $data);
    }

    public function laporan_buku_pdf()
    {
        $this->load->library('dompdf_gen');

        $data['buku'] = $this->ModelBuku->getBuku()->result_array();

        $this->load->view('buku/laporan_pdf_buku', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //orientasi
        $html = $this->output->get_output();

        $this->load->library('pdf');
        $this->pdf->setPaper($paper_size, $orientation);
        //Convert to PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_data_buku.pdf", ['Attachment' => 0]);
        // nama file pdf yang dihasilkan
    }

    public function export_excel()
    {
        $data = ['title' => 'Laporan Buku',
                'buku' => $this->ModelBuku->getBuku()->result_array()];
        $this->load->view('buku/export_excel_buku', $data);
    }
}