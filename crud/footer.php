</body>

<script type="text/javascript">
  $('#check').click(function(){
    $('input:checkbox').not(this).prop('checked',this.checked)
  })
  $(document).ready( function () {
    $('#user_table').DataTable();
} );
</script>

</html>