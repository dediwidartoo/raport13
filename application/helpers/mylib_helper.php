<?php 

function cmb_dinamis($name, $table, $field, $pk, $selected=null)
{
	$CI =& get_instance();
	$cmb = "<select name='$name' id='' class='form-control'>";
	$data = $CI->db->get($table)->result();
	foreach ($data as $row) {
		$cmb .= "<option value='".$row->$pk."'";
		$cmb .= $selected==$row->$pk?'selected':'';
		$cmb .= ">".$row->$field."</option>";
	}
	$cmb .= "</select>";
	return $cmb;
}

function agama_dinamis($name, $table, $field, $pk)
{
	$CI =& get_instance();
	$cmb = "<select name='$name' id='' class='form-control'>";
	$data = $CI->db->get($table)->result();
	foreach ($data as $row) {
		$cmb .= "<option value='".$row->$pk."'";
		$cmb .= $selected==$row->$pk?'selected':'';
		$cmb .= ">".$row->$field."</option>";
	}
	$cmb .= "</select>";
	return $cmb;
}