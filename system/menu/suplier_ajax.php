<?php
/* Database connection start */
include "../koneksi.php";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
    0 => 'kode_suplier',
    1 => 'nama_suplier', 
    2 => 'alamat_suplier',
    3 => 'telpon_suplier'
);

// getting total number records without any search
$sql = "SELECT kode_suplier, nama_suplier, alamat_suplier, telpon_suplier";
$sql.=" FROM suplier";
$query=mysqli_query($conn, $sql) or die("");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT kode_suplier, nama_suplier, alamat_suplier, telpon_suplier ";
    $sql.=" FROM suplier";
    $sql.=" WHERE kode_suplier LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR nama_suplier LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR alamat_suplier LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR telpon_suplier '".$requestData['search']['value']."%' ";
    $query=mysqli_query($conn, $sql) or die("");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die(""); // again run query with limit
    
} else {    

    $sql = "SELECT kode_suplier, nama_suplier, alamat_suplier, telpon_suplier ";
    $sql.=" FROM suplier";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysqli_query($conn, $sql) or die("ajax-grid-data.php: get PO");
    
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 

    $nestedData[] = $row["kode_suplier"];
    $nestedData[] = $row["nama_suplier"];
    $nestedData[] = $row["alamat_suplier"];
    $nestedData[] = $row["telpon_suplier"];
    $nestedData[] = '<td><center>
                     <a href="edit.php?kd='.$row['nim'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning"> <i class="menu-icon icon-pencil"></i> </a>
                     <a href="index.php?hal=hapus&kd='.$row['nim'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </a>
                     </center></td>';        
    
    $data[] = $nestedData;
    
}



$json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
            );

echo json_encode($json_data);  // send data as json format

?>