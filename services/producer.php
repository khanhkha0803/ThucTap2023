<?php
function insert_producer($tenloai){
    $sql="insert into producer(namepc) values('$tenloai')";
    pdo_execute($sql);
}

// hàm xóa cứng, xóa thẳng vào database
function delete_producer($id){
    $sql="delete from producer where id=".$id;
    pdo_execute($sql);
}
// hàm xóa mềm, không xóa thẳng vào database
function remove_producer($id,$status){
    $sql="update producer set status='".$status."' where id=".$id;
    pdo_execute($sql);
}

function loadall_producer(){
    $sql="select * from producer where 1 and status like 1 order by id desc";
    $listproducer = pdo_query($sql);
    return $listproducer;
}
function loadone_producer($id){
    $sql = "select * from producer where id=".$id;
    $producer = pdo_query_one($sql);
    return $producer;
}
function update_producer($id,$namepc){
    $sql="update producer set namepc='".$namepc."' where id=".$id;
    pdo_execute($sql);
}


?>