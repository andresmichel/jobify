<script type="text/javascript">
    new Vue({
        el: '#requirementsApp',
        components: {
            'requirements': {
                template: `<div class="form-group">
                    <label for="requirements">Requisitos</label>
                    <textarea hidden class="form-control" name="requirements" id="requirements"></textarea>
                    <div class="row">
                        <div v-for="(requirement, index) in requirements" class="col-sm-12">
                            <input class="form-control mb-2" :value="requirement" readonly style="padding-right:24px;">
                            <i @click="requirements.splice(index, 1)" class="material-icons text-danger input-icon">cancel</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="requirement-input" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                            <i @click="add" class="material-icons text-success input-icon">add_circle</i>
                        </div>
                    </div>
                    @if ($errors->has('requirements'))
                        <small class="form-text text-danger">{{ $errors->first('requirements') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        requirements:
                        @if (isset($job))
                            {!! $job->requirements !!}
                        @else
                            {!! old('requirements') ?: '[]' !!}
                        @endif
                    };
                },
                watch: {
                    requirements: function (val) {
                        this.update(val);
                    }
                },
                mounted: function () {
                    this.update(this.requirements);
                },
                methods: {
                    add: function () {
                        var input = document.getElementById('requirement-input');

                        if (input.value != '') {
                            this.requirements.push(input.value);
                            input.value = '';
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById('requirements');
                        textarea.value = JSON.stringify(val);
                    }
                }
            }
        },
    });
</script>
