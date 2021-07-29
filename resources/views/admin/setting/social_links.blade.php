<div class="tile">
    <form action="{{ route('admin.setting.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">{{__('labels.social_links')}}</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="social_facebook">{{__('labels.social_facebook')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.social_facebook')}} ..."
                    id="social_facebook"
                    name="social_facebook"
                    value="{{ config('settings.social_facebook') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_twitter">{{__('labels.social_twitter')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.social_twitter')}} ..."
                    id="social_twitter"
                    name="social_twitter"
                    value="{{ config('settings.social_twitter') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_instagram">{{__('labels.social_instagram')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.social_instagram')}} ..."
                    id="social_instagram"
                    name="social_instagram"
                    value="{{ config('settings.social_instagram') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_linkedin">{{__('labels.social_linkedin')}}</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="{{__('labels.social_linkedin')}} ..."
                    id="social_linkedin"
                    name="social_linkedin"
                    value="{{ config('settings.social_linkedin') }}"
                />
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                @can('edit-settings')
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{__('labels.save')}}</button>
                </div>
                @endcan
            </div>
        </div>
    </form>
</div>
