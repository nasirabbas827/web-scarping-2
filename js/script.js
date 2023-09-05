$(document).ready(function() {

    $('#table').DataTable();
    

    $(".EditTeacher").on('click', function (e) {
    $("#ID").val($(this).attr('ID'));
    $("#name").val($(this).attr('name'));
    $("#email").val($(this).attr('email'));
    $("#cellNo").val($(this).attr('cellNo'));
    $(".tbtn").val("Update Teacher");
    $(".modal-title").html("Update Teacher");
    $("#TeacherModal").modal('show');
  });

    

  $(".Std_Update").on('click', function (e) {
    $("#S_ID").val($(this).attr('ID'));
    $("#sname").val($(this).attr('name'));
    $("#rollNo").val($(this).attr('rollNo'));
    $("#semail").val($(this).attr('email'));
    $("#saddress").val($(this).attr('address'));
    $("#scell").val($(this).attr('cell'));
    $("#sgrade").val($(this).attr('grade'));
    $("#spass").val($(this).attr('pass'));
    $("#sbtn").val("Update Student");
    $(".modal-title").html("Update Student");
    $("#StdModal").modal('show');
  });

  $(".EditRoom").on('click', function (e) {
    $("#ID").val($(this).attr('ID'));
    $("#room").val($(this).attr('room'));
    $("#floor").val($(this).attr('floor'));
    $("#capacity").val($(this).attr('capacity'));
    $(".rbtn").val("Update Examination Hall");
    $(".modal-title").html("Update Examination Hall");
    $("#HallModel").modal('show');
  });

  $(".EditSlot").on('click', function (e) {
    $("#ID").val($(this).attr('S_ID'));
    $("#SlotModal").modal('show');
  });

  $(".enroll").on('click', function (e) {
    $("#e_id").val($(this).attr('ID'));
    $("#Enroll").modal('show');
  });

    });

function printPage() {
      window.print();
    }