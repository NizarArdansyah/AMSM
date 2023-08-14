<?php
// make function to count surat from tale surat where status = antre in codeigniter 4
function count_surat($status)
{
    $sm = new \App\Models\SuratModel();
    $count = $sm->where('status', $status)->countAllResults();
    return $count;
}

function checkAlamat()
{
    
}
