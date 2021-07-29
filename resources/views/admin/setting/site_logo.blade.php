<div class="tile">
    <form action="{{ route('admin.setting.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title">Site Logo</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-3">
                    @if (settings('site_logo') !== null)
                        <img src="{{ asset('storage/'.settings('site_logo')) }}" id="logoImg" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9 custom-file">
                    <div class="form-group">
                        <label class="control-label custom-file-label">{{trans_choice('labels.logo',1)}}</label>
                        <input class="form-control custom-file-input" type="file" name="site_logo" id="logo"/>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    @if (settings('site_favicon')) !== null)
                        <img src="{{ asset('storage/'.settings('site_favicon')) }}" id="faviconImg" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9 custom-file">
                    <div class="form-group ">
                        <label class="control-label custom-file-label">Site Favicon</label>
                        <input class="form-control custom-file-input" type="file" name="site_favicon" id="favicon"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile-footer">
            @can('edit-settings')
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{__('labels.save')}}</button>
                </div>
            </div>
            @endcan
        </div>
    </form>
</div>

