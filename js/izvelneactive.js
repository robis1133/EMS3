// ==========ATBILD PAR TO KURŠ NO IZVELNES ELEMENTIEM IR AKTĪVS==========
$(function() {
	//highlight the current nav
	$("#darbagalds a:contains('Darbagalds')").parent().addClass('active');
  $("#parskats a:contains('Pārskats')").parent().addClass('active');
  $("#meklet a:contains('Meklēt')").parent().addClass('active');
	$("#iespejas a:contains('Iespējas')").parent().addClass('active');
});
