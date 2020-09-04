<table id="datatable1" class="table table-bordered table-striped dataTable">
    <thead>
        <tr>
            <th> Name </th>
            <th> Email </th>
            <th> Gender </th>
            <th> Hobbies </th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
    @if(count($users) != "")
    @foreach ($users as $user)    
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->gender}}</td>
            <td>
                @foreach($user->hobbies as $uhobby)
                <p>{{ getHobbyName($uhobby->hobby_id) }}</p>

                @endforeach
            </td>
            <?php 
                $type = 0;
                $request_type = DB::table('user_request')->where(['from_id'=> Auth::id(),'to_id'=>$user->id])->value('request_type');
                if($request_type != ''){
                    $type = $request_type;
                }
            ?>
            <td><a class="btn btn-primary" onclick="sendRequest(<?php echo Auth::id()?>,<?php echo $user->id?>,'1')">{{$type}}</a><a class="btn btn-primary">Block</a></td>
            
        </tr>
    @endforeach
    @else
        <tr>
            <td colspan="3" align="center">
               No Record Found
            </td>
        </tr>
    @endif
</tbody>
</table>

<?php 
     if(count($users) != ""){
?>

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <script>
        $(function() {
            $('#datatable1').DataTable({
                "paging": true,
                "aoColumnDefs": [
                    { 
                      "bSortable": false, 
                      "aTargets": [ -1 ] // <-- gets last column and turns off sorting
                     } 
                 ]
            });
        });


    </script>
<?php } ?>

<script type="text/javascript">
    function getuser(page){
        var url = '{{ url('') }}';                            
        $.ajax({
            url: url+'/ajax/admin_user?page=' + page
        }).done(function(data){
            window.location.reload();
        });
    }
    function sendRequest(from_id,to_id,request_type) {
        var url = '{{ url('') }}';                            
        $.ajax({
            url: url+'/send_request?from_id=' + from_id + '&to_id= ' + to_id + '&request_type=' + request_type
        }).done(function(data){
           // $('#user_container').html(data);
           window.location.reload();
        });
    }
</script>
