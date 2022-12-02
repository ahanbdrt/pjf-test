<?php
class Jawaban extends CI_Controller
{
    public function index()
    {
        $data['jawaban']=$this->jawaban_model->tampil_jawaban();
        $this->load->view('admin/jawaban',$data);
    }
    public function big_five(){
        $pelamar = $this->input->post('pelamar');
        $soal = $this->db->query("SELECT * FROM pertanyaan_big_five");
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
        echo max($total);
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
            'skor'    => max($total)
        );
        $this->jawaban_model->insert($data,'jawaban');
        redirect("jawaban");
    }
}