$(function () {

    show2();
    $("#table1").hide();
    var click=0;
    $("#button1").click(function () {
        if(click==0) {
            $("#table1>tbody").empty();
             $("#table1").show(5000);
            show(10);

        click=1;
        }else{
            $("#table1>tbody").empty();
            $("#table1").show(5000);

            show(12);
click=0;
        }
    });



});
function show2(){
    $.getJSON("TestWorkTrafGit.php?value=show1",function (json) {
        var sum;
        var number=1;
       if(json.mass.length>0){
        $.each(json.mass,function () {
 sum=this['price']*this['count'];
var $tr=$("<tr><td>"+number+"</td><td>"+this['name']+"</td><td>"+this['count']+"</td><td>"+this['price']+"</td><td>"+sum+"</td></tr>")
number++;
$("#table2>tbody").append($tr);
        })
       }


          })


}

function show(operators){
$.getJSON("TestWorkTrafGit.php?value=show",function (json) {

if(json.mass_show.length>0){
$.each(json.mass_show,function () {
    if(this['operid']==operators){
var $tr=$("<tr><td>"+this['id']+"</td><td>"+this['offersname']+"</td><td>"+this['price']+"</td><td>"+this['count']+"</td><td>"+this['operatorsname']+"</td></tr>");
$("#table1>tbody").append($tr);
    }
else if(this['operid']==operators){
        var $tr=$("<tr><td>"+this['id']+"</td><td>"+this['offersname']+"</td><td>"+this['price']+"</td><td>"+this['count']+"</td><td>"+this['operatorsname']+"</td></tr>");
        $("#table1>tbody").append($tr);
    }
})
}

})
}
