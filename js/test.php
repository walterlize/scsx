<?php

header('Content-Type:text/html; charset=utf-8'); //使用gb2312编码，使中文不会变成乱码
$backValue = $_POST['trans_data'];

$this->load->model('m_sum');
$this->load->model('m_cla');
$da = array();
$data['class'] = $this->m_cla->getCla1(array());
foreach ($data['class'] as $r) {
    $sum = $this->m_sum->getSums($r->classId);
    $arr = array('class' => $r->class, 'sum' => $sum);
    array_push($da, $arr);
}
$data['sum'] = $da;
echo $backValue . $data['sum']
?>