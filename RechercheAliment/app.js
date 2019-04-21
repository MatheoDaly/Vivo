console.log('test');
var tab=[];
$("input[type=checkbox]").change(function() {
  if(this.checked) {
    $.each($("input[type='checkbox']:checked"), function() {
      var label = $('label[for=' + $(this).prop('id') + ']').text();
      if (!tab.includes(label)) {
        tab.push(label);
      }
    });
  }else{
    $.each($("input[type='checkbox']:not(:checked)"), function() {
      var label = $('label[for=' + $(this).prop('id') + ']').text();
      var index = tab.indexOf(label);
      if (index > -1) {
        tab.splice(index, 1);
      }
});
}
var html = ' ';
for (i = 0; i < tab.length; i++) {
if ( html.includes(tab[i]) ){
  html.replace(tab[i], tab[i] );
}else {   var html = html.concat(' <br/> ', tab[i]); }
}
document.getElementById('labelName').innerHTML = html;
console.log(html);
console.log(tab);
});
