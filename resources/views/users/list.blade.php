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
        <?php $type_data = getRequestType(Auth::id(), $user->id);
        ?>
        @if($type_data['type'] != "hide")
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->gender}}</td>
            <td>
                @foreach($user->hobbies as $uhobby)
                <p>{{ getHobbyName($uhobby->hobby_id) }}</p>
                @endforeach
            </td>
            <td>
                @if($type_data['type'] == 'blocked')
                    <span class="btn btn-red">Blocked</span>
                @else
                    @if($type_data['type'] == 'sent' || $type_data['type'] == 'friends')
                        <span class="btn btn-green">{{$type_data['type_text']}}</span>
                    @endif
                    @if($type_data['type'] == 'accept')
                        <a class="btn btn-primary" onclick="sendRequest(<?php echo Auth::id()?>,<?php echo $user->id?>,'2')">{{$type_data['type_text']}}</a>
                    @endif
                    @if($type_data['type'] == 'send')
                        <a class="btn btn-primary" onclick="sendRequest(<?php echo Auth::id()?>,<?php echo $user->id?>,'1')">{{$type_data['type_text']}}</a>
                    @endif
                        <a class="btn btn-primary" onclick="sendRequest(<?php echo Auth::id()?>,<?php echo $user->id?>,'3')">Block</a>
                @endif

            </td>
            
        </tr>
        @endif
        @endforeach
        @else
        <tr>
            <td colspan="5" align="center">
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
    function getSearch(page){
        var field_hobby = $('#field_hobby').val();
        var field_gender = $('#field_gender').val();
        var url = '{{ url('') }}';                            
        $.ajax({
            url: url+'/search_user?field_hobby=' + field_hobby + '&field_gender=' + field_gender
        }).done(function(data){
            $('#user_container').html(data);
        });
    }
    function sendRequest(from_id,to_id,request_type) {
        var url = '{{ url('') }}';                            
        $.ajax({
            url: url+'/send_request?from_id=' + from_id + '&to_id= ' + to_id + '&request_type=' + request_type
        }).done(function(data){
           window.location.reload();
       });
    }
</script>
