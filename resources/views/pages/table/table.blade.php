@section('overview')

  <table class="table table-bordered">
  <thead>
    <tr bgcolor="#f5f5dc">
      <th scope="col">Air Quality Index Lower Bound</th>
      <th scope="col">Air Quality Index Upper Bound</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Precautionary Actions</th>
    </tr>
  </thead>
  <tbody>

        @foreach($healthHazardData as $item)
        <tr bgcolor={{$item->color}}>
            <td>{{$item->air_quality_index_lower_bound}}</td>
            <td>{{$item->air_quality_index_upper_bound}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->precautionary_actions}}</td>
        </tr>
        @endforeach


  </tbody>
</table>
@stop