<div class="tile">
    <form action="{{ route('admin.setting.update') }}" method="POST" role="form">
        @csrf
        <h3 class="">General Settings</h3>
        <hr>
        <div class="">
            <div class="form-group">
                <label class="control-label" for="site_name">{{__('site_name')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.site_name')}} ..."
                    id="site_name"
                    name="site_name"
                    value="{{ settings('site_name') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">{{__('labels.default_email')}}</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="{{__('labels.default_email')}}"
                    id="default_email_address"
                    name="default_email_address"
                    value="{{ config('settings.default_email_address') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code">{{__('labels.currency_code')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.currency_code')}}"
                    id="currency_code"
                    name="currency_code"
                    value="{{ config('settings.currency_code') }}"
                />
            </div>

        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{__('labels.save')}}</button>
                </div>
            </div>
        </div>
    </form>

</div>
