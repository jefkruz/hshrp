@extends('layouts.admin')

@section('content')

    @include('partials.breadcrumb')



    <div id="newDepartmentModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('style')
@endsection

@section('script')
@endsection
