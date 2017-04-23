<script type="text/javascript">
    new Vue({
        el: '#sectionsApp',
        components: {
            'sections': {
                template: `<div class="form-group">
                    <label for="sections">Secciones</label>
                    <textarea hidden class="form-control" name="sections" id="sections"></textarea>
                    <div class="row">
                        <div v-for="(section, index) in sections" class="col-sm-12">
                            <input class="form-control mb-2" :value="section.name" readonly style="padding-right:24px;">
                            <i @click="sections.splice(index, 1)" class="material-icons text-danger input-icon">close</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="section-input" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                            <i @click="add" class="material-icons text-success input-icon">add</i>
                        </div>
                    </div>
                    @if ($errors->has('sections'))
                        <small class="form-text text-danger">{{ $errors->first('sections') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        sections:
                        @if (auth()->user()->aspirant->resume)
                            {!! auth()->user()->aspirant->resume->sections !!}
                        @else
                            {!! old('sections') ?: '[]' !!}
                        @endif
                    };
                },
                watch: {
                    sections: function (val) {
                        this.update(val);
                    }
                },
                mounted: function () {
                    this.update(this.sections);
                },
                methods: {
                    add: function () {
                        var input = document.getElementById('section-input');

                        if (input.value != '') {
                            this.sections.push({
                                name: input.value,
                                sections: []
                            });
                            input.value = '';
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById('sections');
                        textarea.value = JSON.stringify(val);
                    }
                }
            }
        },
    });
</script>
