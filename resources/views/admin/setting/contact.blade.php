<div class="tile">
    <form action="{{ route('admin.setting.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">{{__('labels.contact')}}</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="address">{{__('labels.address')}}</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="{{__('labels.address')}} ..."
                    id="address"
                    name="address"
                >{!! settings('address') !!}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">{{__('labels.phone')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.phone')}} ..."
                    id="phone"
                    name="phone"
                    value="{{ settings('phone') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="fax">{{__('labels.fax')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.fax')}} ..."
                    id="fax"
                    name="fax"
                    value="{{ config('settings.fax') }}"
                />
            </div>


            <div class="form-group">
                <label class="control-label" for="contact_email">{{__('labels.contact_email')}}</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="{{__('labels.contact_email')}} ..."
                    id="contact_email"
                    name="contact_email"
                    value="{{ settings('contact_email') }}"
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
