@extends('layouts.admin')

@section('template_title')
    Appraisal Attribute
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Appraisal Attribute') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('appraisal-attributes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Attribute</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appraisalAttributes as $appraisalAttribute)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $appraisalAttribute->attribute }}</td>
											<td>{{ $appraisalAttribute->description }}</td>

                                            <td>
                                                <form action="{{ route('appraisal-attributes.destroy',$appraisalAttribute->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('appraisal-attributes.show',$appraisalAttribute->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('appraisal-attributes.edit',$appraisalAttribute->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $appraisalAttributes->links() !!}
            </div>
        </div>
    </div>
@endsection
