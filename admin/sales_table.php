<?php include('connection.php'); ?>
<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	if (isset($_SESSION['zalogowany'])&&$_SESSION['user']!="admin")
	{
		header('Location: panel.php');
		exit();
	}
	
	require_once 'library.php';
	
	?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <title>Server Side CRUD Ajax Operations</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <script src="js/jquery-ui.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

	<?php
		$_SESSION['$today'] = date("Y.m.d");  
		echo '<div class="logout_data">Zalogowany:
			<span class="logout_data_user">'.$_SESSION['user'].'</span>
			<span class="logout_data_date">'.$_SESSION['$today'] .'</span>
			<a class="logout_data_logout" href="logout.php">[ Wyloguj ]</a>
		</div>';
	?>
	<?php include('nav.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="btnAdd">
          <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-success btn-sm">Add User</a>
        </div>
        <div class="row">
            <table id="example" class="table">
              <thead>
                <th>Id</th>
                <th>Produkt</th>
                <th>Gdzie</th>
                <th>Skąd</th>
                <th>Rozmiar</th>
                <th>Kwota 1</th>
                <th>Waluta 1</th>
                <th>Kwota 2</th>
                <th>Waluta 2</th>
                <th>Kwota 3</th>
                <th>Waluta 3</th>
                <th>Karta</th>
                <th>Data</th>
                <th min-width="200px"></th>
              </thead>
              <tbody>
              </tbody>
            </table>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript">

    $(document).ready(function() {

//Fukcja opowiedzialna za walidację danych umożliwiająca wpisanie tylko liczb przedstawiających walutę	
		// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter, errMsg) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
    textbox.addEventListener(event, function(e) {
      if (inputFilter(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          this.classList.remove("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        this.classList.add("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  });
}

	//Podpięcie funkcji setInputFilter odpowiedzialnej za walidację danych czyli umożliwia wpisanie do inputów tylko liczb przedsawiających walutę
	setInputFilter(document.getElementById("amount_1_add"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");
	setInputFilter(document.getElementById("amount_2_add"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");
	setInputFilter(document.getElementById("amount_3_add"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");
	setInputFilter(document.getElementById("card_add"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");
	  
	//Podpięcie funkcji setInputFilter odpowiedzialnej za walidację danych czyli umożliwia wpisanie do inputów tylko liczb przedsawiających walutę
	setInputFilter(document.getElementById("amount_1_edit"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");
	setInputFilter(document.getElementById("amount_2_edit"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");  
	setInputFilter(document.getElementById("amount_3_edit"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");
	setInputFilter(document.getElementById("card_edit"), function(value) {
	  return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Wartość musi być walutą");

	$('.date_add').datepicker({
		format: "yyyy-mm-dd",
		startDate: "01-01-2015",
		endDate: "01-01-2020",
		todayBtn: "linked",
		language: 'pl',
		autoclose: true,
		todayHighlight: true
	});
	$('.date_edit').datepicker({
		format: "yyyy-mm-dd",
		startDate: "01-01-2015",
		endDate: "01-01-2020",
		todayBtn: "linked",
		language: 'pl',
		autoclose: true,
		todayHighlight: true
	});


	//Fukcja autocomplete rozwijająca listę produjktów wyciągniętą z bazy danych 
	$( function() {
		var availableTags = <?php echo json_encode($designation, JSON_HEX_TAG); ?>;
		$( "#item_name_add" ).autocomplete({
		source: function(request, response) {
		var results = $.ui.autocomplete.filter(availableTags, request.term);

		response(results.slice(0, 10));
		}
		});
	} );
			
	//Fukcja autocomplete rozwijająca listę produjktów wyciągniętą z bazy danych 	
	$( function() {
		var availableTags = <?php echo json_encode($designation, JSON_HEX_TAG); ?>;
		$( "#item_name_edit" ).autocomplete({
		source: function(request, response) {
		var results = $.ui.autocomplete.filter(availableTags, request.term);
		response(results.slice(0, 10));
		}
		});
	} );
	
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
		'columnDefs': [
			{ "width": "250px", "targets": 13 },
     		{
        		'targets': 0,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"id"); 
        		}
     		},
			  {
        		'targets': 1,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Produkt"); 
        		}
     		},
			  {
        		'targets': 2,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Gdzie"); 
        		}
     		},
			  {
        		'targets': 3,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Skąd"); 
        		}
     		},
			  {
        		'targets': 4,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Rozmiar"); 
        		}
     		},
			  {
        		'targets': 5,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Kwota 1"); 
        		}
     		},
			  {
        		'targets': 6,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Waluta 1"); 
        		}
     		},
			  {
        		'targets': 7,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Kwota 2"); 
        		}
     		},
			  {
        		'targets': 8,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Waluta 2"); 
        		}
     		},
			  {
        		'targets': 9,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Kwota 3"); 
        		}
     		},
			  {
        		'targets': 10,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Waluta 3"); 
        		}
     		},
			  {
        		'targets': 11,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Karta"); 
        		}
     		},
			  {
        		'targets': 12,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('data-label',"Data"); 
        		}
     		}

  		],
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [13]
          },

        ]
      });
    });
    $(document).on('submit', '#addUser', function(e) {
      e.preventDefault();
      var size_add = $('#size_add').val();
      var item_name_add = $('#item_name_add').val();
      var item_from_add = $('#item_from_add').val();
      var where_sold_add = $('#addEmailField').val();
      var amount_1_add = $('#amount_1_add').val();
      var currency_1_add = $('#currency_1_add').val();
      var amount_2_add = $('#amount_2_add').val();
      var currency_2_add = $('#currency_2_add').val();
      var amount_3_add = $('#amount_3_add').val();
      var currency_3_add = $('#currency_3_add').val();
      var card_add = $('#card_add').val();
      var date_add = $('#date_add').val();
      if (size_add != '' && item_name_add != ''&& date_add != ''&& card_add != '' && item_from_add != ''&& currency_3_add != ''&& amount_3_add != '' && where_sold_add != ''&& amount_1_add != ''&& currency_1_add != ''&& amount_2_add != ''&& currency_2_add != '') {

		//Zmiana formatu daty
		var arr1 = date_add.split('/');
		var arrr=arr1[2]+'-'+arr1[1]+'-'+arr1[0]
		date_add=arrr;

		var bool=false;
		var availableTags = <?php echo json_encode($designation, JSON_HEX_TAG); ?>;


		for(let i=0;i<availableTags.length-1;i++)
		{
			if(availableTags[i]==item_name_add){
				bool=true;
			}
		}

		if(bool==true){
		$.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            size_add: size_add,
            item_name_add: item_name_add,
            item_from_add: item_from_add,
            where_sold_add: where_sold_add,
            amount_1_add: amount_1_add,
            currency_1_add: currency_1_add,
            amount_2_add: amount_2_add,
            currency_2_add: currency_2_add,
            amount_3_add: amount_3_add,
            currency_3_add: currency_3_add,
            card_add: card_add,
            date_add: date_add
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
			
		}else{
			alert("Produktu nie ma na liście. Wpisz poprawie produkt")
		}

      } else {
        alert('Wszystkie pola muszą być uzupełnione');
      }
    });
	
    $(document).on('submit', '#updateUser', function(e) {

      e.preventDefault();
      //var tr = $(this).closest('tr');
      var id = $('#id').val();   	  
	  var item_name = $('#item_name_edit').val();
	  var where_sold = $('#where_sold_edit').val();
	  var item_from = $('#item_from_edit').val();  
      var size = $('#size_edit').val();
	  var amount_1=$('#amount_1_edit').val();
	  var currency_1=$('#currency_1_edit').val();
	  var amount_2=$('#amount_2_edit').val();
	  var currency_2=$('#currency_2_edit').val()
	  var amount_3=$('#amount_3_edit').val();
	  var currency_3=$('#currency_3_edit').val();
	  var card=$('#card_edit').val();
	  var date=$('#date_edit').val();
      var trid = $('#trid').val();
	  
	  var bool=false;
	  var availableTags = <?php echo json_encode($designation, JSON_HEX_TAG); ?>;
	  
      if (item_name != ''&& where_sold != '' && item_from != '' && size!='' && amount_1 != ''&& currency_1 != ''&& amount_2 != ''&& currency_2 != ''&& amount_3 != ''&& currency_3 != ''&& card != ''&& date != '') {
		  
	
		if(date[2]=='/')
		{
			var new_date=date.split('/');
			var date=new_date[2]+'-'+new_date[1]+'-'+new_date[0]
		}
	
		if(date[4]==='-'){
			var new_date=date.split('-');
			var date=new_date[0]+'-'+new_date[1]+'-'+new_date[2]
		}
		
		for(let i=0;i<availableTags.length-1;i++)
		{
			if(availableTags[i]==item_name){
				bool=true;
			}
		}

		if(bool==true){
			        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
			id: id,
            size: size,
            item_name: item_name,
            item_from: item_from,
            where_sold: where_sold,
            amount_1: amount_1,
            currency_1: currency_1,
			amount_2: amount_2,
            currency_2: currency_2,
			amount_3: amount_3,
            currency_3: currency_3,
			card: card,
            date: date

          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(item_name);
              // table.cell(parseInt(trid) - 1,2).data(where_sold);
              // table.cell(parseInt(trid) - 1,3).data(item_from);
              // table.cell(parseInt(trid) - 1,4).data(size);
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, item_name, where_sold, item_from, size,amount_1,currency_1,amount_2,currency_2,amount_3,currency_3,card,date, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
		}else{
			alert("Produkt nie znajduje się w bazie danych produktów. Wprowadź poprawna nazwę");			
		}
			

      } else {
        alert('Wszystkie pola muszą być uzupełnione.');
      }
    });
	
	
	
	
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#item_name_edit').val(json.item_name);
          $('#where_sold_edit').val(json.where_sold);
		  $('#item_from_edit').val(json.item_from);
          $('#size_edit').val(json.size);
          $('#amount_1_edit').val(json.amount_1);
          $('#currency_1_edit').val(json.currency_1);		  
          $('#amount_2_edit').val(json.amount_2);
          $('#currency_2_edit').val(json.currency_2);		  
		  $('#amount_3_edit').val(json.amount_3);
          $('#currency_3_edit').val(json.currency_3);
		  $('#card_edit').val(json.card);
          $('#date_edit').val(json.date);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });
	
	

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Jesteś pewny, że chcesz usunąć wiersz ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }



    })
	
	
	
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="item_name_edit" class="col-md-3 form-label">Produkt</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="item_name_edit" name="item_name_edit">
              </div>
			</div>
            <div class="mb-3 row">
              <label for="where_sold_edit" class="col-md-3 form-label">Gdzie</label>
              <div class="col-md-9">
                <select class="form-select" name="where_sold_edit" id="where_sold_edit"><?php echo fill_from_box($connect); ?></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="item_from_edit" class="col-md-3 form-label">Skąd</label>
              <div class="col-md-9">
                <select class="form-select" name="item_from_edit" id="item_from_edit"><?php echo fill_from_box($connect); ?></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="size_edit" class="col-md-3 form-label">Rozmiar</label>
              <div class="col-md-9">
                <select class="size1 form-select" name="size_edit" id="size_edit"><option value="-">-</option><?php echo fill_sizes_box($connect); ?></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="amount_1_edit" class="col-md-3 form-label">Kwota 1</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="amount_1_edit" name="amount_1_edit">
              </div>
            </div>
			<div class="mb-3 row">
              <label for="currency_1_edit" class="col-md-3 form-label" >Waluta 1</label>
              <div class="col-md-9">
                <select class="form-select" name="currency_1_edit" id="currency_1_edit"><?php echo fill_unit_select_box($connect); ?></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="amount_2_edit" class="col-md-3 form-label">Kwota 2</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="amount_2_edit" name="amount_2_edit">
              </div>
            </div>
			<div class="mb-3 row">
              <label for="currency_2_edit" class="col-md-3 form-label" >Waluta 2</label>
              <div class="col-md-9">
                <select class="form-select" name="currency_2_edit" id="currency_2_edit"><?php echo fill_unit_select_box($connect); ?></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="amount_3_edit" class="col-md-3 form-label">Kwota 3</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="amount_3_edit" name="amount_2_edit">
              </div>
            </div>
			<div class="mb-3 row">
              <label for="currency_3_edit" class="col-md-3 form-label" >Waluta 3</label>
              <div class="col-md-9">
                <select class="form-select" name="currency_3_edit" id="currency_3_edit"><?php echo fill_unit_select_box($connect); ?></select>
              </div>
            </div>
			<div class="mb-3 row">
              <label for="card_edit" class="col-md-3 form-label" >Karta</label>
              <div class="col-md-9">
                <input type="text" class="form-control" autocomplete="off" id="card_edit" name="card_edit">
              </div>
            </div>
			<div class="mb-3 row">
              <label for="date_edit" class="col-md-3 form-label" >Data</label>
              <div class="col-md-9">
                <input readonly type="text" class="form-control date_edit" autocomplete="off" id="date_edit" name="date_edit">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
            <div class="mb-3 row">
              <label for="item_name_add" class="col-md-3 form-label" >Produkt</label>
              <div class="col-md-9">
                <input type="text" class="form-control" autocomplete="off" id="item_name_add" name="item_name_add">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addEmailField" class="col-md-3 form-label">Gdzie</label>
              <div class="col-md-9">
                <select class="form-select" name="addEmailField" id="addEmailField"><?php echo fill_from_box($connect); ?></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="item_from_add" class="col-md-3 form-label">Skąd</label>
              <div class="col-md-9">
                <select class="form-select" name="item_from_add" id="item_from_add"><?php echo fill_from_box($connect); ?></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="size_add" class="col-md-3 form-label">Rozmiar</label>
              <div class="col-md-9">
                <select class="size1 form-select" name="size_add" id="size_add"><option value="-">-</option><?php echo fill_sizes_box($connect); ?></select>
              </div>
            </div>
			
            <div class="mb-3 row">
              <label for="amount_1_add" class="col-md-3 form-label" >Kwota 1</label>
              <div class="col-md-9">
                <input type="text" class="form-control" autocomplete="off" id="amount_1_add" name="amount_1_add">
              </div>
            </div>
			
			<div class="mb-3 row">
              <label for="currency_1_add" class="col-md-3 form-label" >Waluta 1</label>
              <div class="col-md-9">
                <select class="form-select" name="currency_1_add" id="currency_1_add"><?php echo fill_unit_select_box($connect); ?></select>
              </div>
            </div>
			
			<div class="mb-3 row">
              <label for="amount_2_add" class="col-md-3 form-label" >Kwota 2</label>
              <div class="col-md-9">
                <input type="text" class="form-control" autocomplete="off" id="amount_2_add" name="amount_1_add">
              </div>
            </div>
			
			
			<div class="mb-3 row">
              <label for="currency_2_add" class="col-md-3 form-label" >Waluta 2</label>
              <div class="col-md-9">
                <select class="form-select" name="currency_2_add" id="currency_2_add"><?php echo fill_unit_select_box($connect); ?></select>
              </div>
            </div>

			<div class="mb-3 row">
              <label for="amount_3_add" class="col-md-3 form-label" >Kwota 3</label>
              <div class="col-md-9">
                <input type="text" class="form-control" autocomplete="off" id="amount_3_add" name="amount_3_add">
              </div>
            </div>
			
			<div class="mb-3 row">
              <label for="currency_3_add" class="col-md-3 form-label" >Waluta 3</label>
              <div class="col-md-9">
                <select class="form-select" name="currency_3_add" id="currency_3_add"><?php echo fill_unit_select_box($connect); ?></select>
              </div>
            </div>
			
			<div class="mb-3 row">
              <label for="card_add" class="col-md-3 form-label" >Karta</label>
              <div class="col-md-9">
                <input type="text" class="form-control" autocomplete="off" id="card_add" name="card_add">
              </div>
            </div>
			
			<div class="mb-3 row">
              <label for="date_add" class="col-md-3 form-label" >Data</label>
              <div class="col-md-9">
                <input readonly type="text" class="form-control date_add" data-date-format="yyyy-mm-dd" autocomplete="off" id="date_add" name="date_add">
              </div>
            </div>
			
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>