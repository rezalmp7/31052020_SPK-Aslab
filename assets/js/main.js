
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
});

$(document).ready(function() {
    $("#login").show();
    $("#register").hide();

    $("#form_step1").show();
    $("#form_step2").hide();
});
$("#toRegister").click(function () {
    $("#login").hide(300);
    $("#register").show(300);
});
$("#toLogin").click(function () {
    $("#login").show(300);
    $("#register").hide(300);
});
$("#toStep2").click(function () {
    var nama = $("#nama").val();
    var npm = $("#npm").val();
    var no_hp = $("#no_hp").val();
    var semester = $("#semester").val();
    var alamat = $("#alamat").val(); 

    if(nama=="" && npm=="" && no_hp=="" && semester=="" && alamat=="")
    {
        alert("Data Harus Diisi Semua");
    }
    else
    {
        $(".circle2").addClass("active");
        $("#form_step1").hide(300);
        $("#form_step2").show(300);
    }
});
$("#toStep1").click(function () {
    $(".circle2").removeClass("active");
    $("#form_step1").show(300);
    $("#form_step2").hide(300);
});