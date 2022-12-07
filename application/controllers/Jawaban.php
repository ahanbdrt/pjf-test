<?php
class Jawaban extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') == 'pelamar'){
            $redirect = base_url('dashboard');
            echo "<script>window.alert('anda tidak bisa mengakses halaman ini!'); window.location='$redirect'</script>";
        }
        elseif ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/login');
        }
    }
    
    public function index()
    {   $pjf = $this->db->get('person-job-fit')->num_rows();
        $pof = $this->db->get('person-organization-fit')->num_rows();
        $jumlah = ($pof + $pjf)*5;
        $data["jumlah"] = $jumlah;
        $data['jawaban']=$this->jawaban_model->tampil_jawaban();
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('admin/jawaban',$data);
        $this->load->view('partials/footer');
    }
    public function big_five(){
        $pelamar = $this->input->post('pelamar');
        $tgl = date("Y-m-d");
        $soal = $this->db->query("SELECT * FROM big_five");
        foreach($soal->result() as $s){
            $skor = $this->input->post($s->id_soal);
            if(substr($skor,0,1)==1){
                $skor1[] = substr($skor,1,1); 
            }
            if(substr($skor,0,1)==2){
                $skor2[] = substr($skor,1,1); 
            }
            if(substr($skor,0,1)==3){
                $skor3[] = substr($skor,1,1); 
            }
            if(substr($skor,0,1)==4){
                $skor4[] = substr($skor,1,1); 
            }
            if(substr($skor,0,1)==5){
                $skor5[] = substr($skor,1,1); 
            }
        }
        $total1=0;
        for($i=0;$i<count($skor1);$i++){
            $total1+=$skor1[$i];
        }
        $total2=0;
        for($i=0;$i<count($skor2);$i++){
            $total2+=$skor2[$i];
        }
        $total3=0;
        for($i=0;$i<count($skor3);$i++){
            $total3+=$skor3[$i];
        }
        $total4=0;
        for($i=0;$i<count($skor4);$i++){
            $total4+=$skor4[$i];
        }
        $total5=0;
        for($i=0;$i<count($skor5);$i++){
            $total5+=$skor5[$i];
        }
        $total = [$total1,$total2,$total3,$total4,$total5];
        // echo max($total);
        if(max($total)==$total[0]){
            $faktor = 1;
        }
        if(max($total)==$total[1]){
            $faktor = 2;
        }
        if(max($total)==$total[2]){
            $faktor = 3;
        }
        if(max($total)==$total[3]){
            $faktor = 4;
        }
        if(max($total)==$total[4]){
            $faktor = 5;
        }
        $data=array(
            'pelamar' => $pelamar,
            'faktor'  => $faktor,
            'tgl'     => $tgl,
            'pjf'     => '',
            'pof'     => '',
        );
        $data1=array(
            'faktor'  => $faktor,
        );
        $where=array(
            'pelamar' => $pelamar,
            'tgl'     => $tgl
        );
        $cek = $this->db->where('pelamar',$pelamar)->where('tgl',$tgl)->get('jawaban');
        $this->db->trans_start();
        if($cek->num_rows() > 0){
            $this->jawaban_model->update($where,$data1,'jawaban');
        }else{
            $this->jawaban_model->insert($data,'jawaban');
        }
        $this->db->trans_complete();
        redirect("home");
    }

    public function pjf(){
        $pelamar = $this->input->post('pelamar');
        $tgl = $this->input->post('tgl_test');
        $soal = $this->db->get('person-job-fit');
        foreach($soal->result() as $s){
            $skor = $this->input->post($s->id_pjf);
            $jumlah[] = $skor;
        }
        $total=0;
        for($i=0;$i<count($jumlah);$i++){
            $total+=$jumlah[$i];
        }
        $data=array(
            'pelamar' => $pelamar,
            'faktor'  => '',
            'tgl'     => $tgl,
            'pjf'     => $total,
            'pof'     => '',
        );
        $data1=array(
            'pjf'  => $total,
        );
        $where=array(
            'pelamar' => $pelamar,
            'tgl'     => $tgl
        );
        $cek = $this->db->where('pelamar',$pelamar)->where('tgl',$tgl)->get('jawaban');
        $this->db->trans_start();
        if($cek->num_rows() > 0){
            $this->jawaban_model->update($where,$data1,'jawaban');
        }else{
            $this->jawaban_model->insert($data,'jawaban');
        }
        $this->db->trans_complete();
        redirect("home");
    }

    public function pof(){
        $pelamar = $this->input->post('pelamar');
        $tgl = $this->input->post('tgl_test');
        $soal = $this->db->get('person-organization-fit');
        foreach($soal->result() as $s){
            $skor = $this->input->post($s->id_pof);
            $jumlah[] = $skor;
        }
        $total=0;
        for($i=0;$i<count($jumlah);$i++){
            $total+=$jumlah[$i];
        }
        $data=array(
            'pelamar' => $pelamar,
            'faktor'  => '',
            'tgl'     => $tgl,
            'pjf'     => '',
            'pof'     => $total,
        );
        $data1=array(
            'pof'  => $total,
        );
        $where=array(
            'pelamar' => $pelamar,
            'tgl'     => $tgl
        );
        $cek = $this->db->where('pelamar',$pelamar)->where('tgl',$tgl)->get('jawaban');
        $this->db->trans_start();
        if($cek->num_rows() > 0){
            $this->jawaban_model->update($where,$data1,'jawaban');
        }else{
            $this->jawaban_model->insert($data,'jawaban');
        }
        $this->db->trans_complete();
        redirect("home");
    }
}