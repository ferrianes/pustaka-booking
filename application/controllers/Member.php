<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Member extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelBuku', 'ModelUser']);
    }

    public function index() {
        $this->_login();
    }

    private function _login() {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika user sudah aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id'],
                        'nama' => $user['nama']
                    ];

                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda Berhasil Login!</div>');
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Salah!!!</div>');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar</div>');
            redirect('home');
        }
    }

    public function daftar() {
        //Form Validation Nama
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diisi!'
        ]);

        //Form Validation Alamat
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required', [
            'required' => 'Alamat Belum diisi!'
        ]);

        //Form Validation Email
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Belum diisi!',
            'valid_email' => 'Email tidak benar!',
            'is_unique' => 'Email sudah terdaftar'
        ]);

        //Form Validation Password
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'required' => 'Password harus diisi!!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if (!$this->form_validation->run() == false) {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => $this->input->post('alamat', true),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_input' => time()
            ];
            $this->ModelUser->simpanData($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun anggota anda sudah dibuat.</div>');
            redirect(base_url());
        } else {
            $data = [
                'judul' => "Katalog Buku",
                'buku' => $this->ModelBuku->getBuku()->result()
            ];
            $data['user'] = 'Pengunjung';

            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer', $data);
        }

        
    }

    public function myProfil() {
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'image' => $user['image'],
            'user' => $user['nama'],
            'email' => $user['email'],
            'tanggal_input' => $user['tanggal_input'],
            'judul' => 'Profil Saya'
        ];

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function ubahProfil() {
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'image' => $user['image'],
            'user' => $user['nama'],
            'email' => $user['email'],
            'tanggal_input' => $user['tanggal_input'],
            'judul' => 'Profil Saya'
        ];

        // Validasi Nama
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        //Cek jika validasi gagal dan default
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('member/ubah-member', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|jpeg|JPEG';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $user['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Profil gagal diubah <br><b>'. $error .'</b></div>');
                redirect('member/myprofil');
                }

                $this->db->set('nama', $nama);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
                redirect('member/myprofil');
            } else {
                $this->db->set('nama', $nama);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
                redirect('member/myprofil');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda Telah logout!!</div>');
        redirect('home');
    }
}