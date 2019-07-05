<h2>Live Database</h2>
New Product tables Exists? = {{$new_table_exist}} *Expected Answer = No (If Yes, refresh incomplete) <br>
aa
bb
# Visible Skus = {{$visible_sku}} <br>
# Not Visible Skus = {{$not_visible_sku}} <br>
# records in Products = {{$products}} <br>
# records in Variants = {{$variants}} <br>
# records in Tags = {{$tags}} <br>
# records in Images = {{$images}} <br>
# records in Groups = {{$groups}} <br>
# records in Ap21_notes = {{$ap21_notes}} <br>
# records in Ap21_notes_distinct = {{$ap21_notes_distinct}} (Distinct Style an Color IDX) <br>
# records in Ap21_processed_idx = {{$ap21_processed_idx}} (Should be ~= ap21_processed_idx ) <br>
# records in Ap21_Unprocessed_idx = {{$ap21_unprocessed_idx}} (Should be 0) <br>


<h2>Future Database</h2>
# Visible Skus = {{$future_visible_sku}} <br>
# Not Visible Skus = {{$future_not_visible_sku}} <br>

<h2>Last Log Entries</h2>
<table border=1 cellSpacing=0 cellPadding=0 width=80%>
@foreach ($logs as $log)
    <tr>
    <td>{{$log->tb_name}}</td>
    <td>{{$log->log_desc}}</td>
    <td>{{$log->created_at}}</td>
    </tr>
@endforeach