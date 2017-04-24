<script type="text/javascript">
    new Vue({
        el: '#sectionsApp',
        components: {
            'education': {
                props: ['title', 'name', 'id'],
                template: `<div class="form-group">
                    <label :for="id">@{{ title }}</label>
                    <textarea hidden class="form-control" :name="name" :id="id"></textarea>
                    <div class="row m-0 pb-2 pt-1 mb-3" style="border:1px solid #eee!important;border-radius:4px;position:relative;" v-for="(edu, index) in education">
                        <div class="col-sm-6">
                            <label class="small">Institución</label>
                            <input class="form-control mb-2" :value="edu.school" readonly style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Curso</label>
                            <input class="form-control mb-2" :value="edu.course" readonly style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Desde</label>
                            <input class="form-control mb-2" :value="edu.from" readonly style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Hasta</label>
                            <input class="form-control mb-2" :value="edu.to" readonly style="padding-right:24px;">
                        </div>
                        <i @click="education.splice(index, 1)" class="material-icons text-danger input-icon" style="right:-8px;top:-8px;cursor:pointer">cancel</i>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="small">Institución</label>
                            <input v-model="school" @keydown.enter.prevent="" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Curso</label>
                            <input v-model="course" @keydown.enter.prevent="" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Desde</label>
                            <input v-model="from" @keydown.enter.prevent="" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Hasta</label>
                            <input v-model="to" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-12">
                            <a href="#" class="mb-3 mt-2 btn btn-primary" @click.prevent="add">Agregar<a>
                        </div>
                    </div>
                    @if ($errors->has('education'))
                        <small class="form-text text-danger">{{ $errors->first('education') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        school: '',
                        from: '',
                        to: '',
                        course: '',
                        education:
                        @if (auth()->user()->aspirant->resume)
                            {!! auth()->user()->aspirant->resume->sections !!}.education,
                        @else
                            {!! old('education') ?: '[]' !!},
                        @endif
                    };
                },
                watch: {
                    education: function (val) {
                        this.update(val);
                    }
                },
                mounted: function () {
                    this.update(this.education);
                },
                methods: {
                    add: function () {
                        var input = document.getElementById(this.inputId);

                        if (! this.empty()) {
                            this.education.push(this.getData());
                            this.reset();
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById(this.id);
                        textarea.value = JSON.stringify(val);
                    },
                    reset: function () {
                        this.school = '';
                        this.from = '';
                        this.to = '';
                        this.course = '';
                    },
                    getData: function () {
                        return {
                            school: this.school,
                            from: this.from,
                            to: this.to,
                            course: this.course,
                        }
                    },
                    empty: function () {
                        if (this.school == ''
                            || this.from == ''
                            || this.to == ''
                            || this.course == '') {
                            return true;
                        }

                        return false;
                    }
                }
            },
            'experience': {
                props: ['title', 'name', 'id'],
                template: `<div class="form-group">
                    <label :for="id">@{{ title }}</label>
                    <textarea hidden class="form-control" :name="name" :id="id"></textarea>
                    <div class="row m-0 pb-2 pt-1 mb-3" style="border:1px solid #eee!important;border-radius:4px;position:relative;" v-for="(exp, index) in experience">
                        <div class="col-sm-6">
                            <label class="small">Empresa</label>
                            <input class="form-control mb-2" :value="exp.company" readonly style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Puesto</label>
                            <input class="form-control mb-2" :value="exp.ocupation" readonly style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Desde</label>
                            <input class="form-control mb-2" :value="exp.from" readonly style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Hasta</label>
                            <input class="form-control mb-2" :value="exp.to" readonly style="padding-right:24px;">
                        </div>
                        <i @click="experience.splice(index, 1)" class="material-icons text-danger input-icon" style="right:-8px;top:-8px;cursor:pointer">cancel</i>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="small">Empresa</label>
                            <input v-model="company" @keydown.enter.prevent="" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Puesto</label>
                            <input v-model="ocupation" @keydown.enter.prevent="" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Desde</label>
                            <input v-model="from" @keydown.enter.prevent="" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Hasta</label>
                            <input v-model="to" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-12">
                            <a href="#" class="mb-3 mt-2 btn btn-primary" @click.prevent="add">Agregar<a>
                        </div>
                    </div>
                    @if ($errors->has('experience'))
                        <small class="form-text text-danger">{{ $errors->first('experience') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        company: '',
                        from: '',
                        to: '',
                        ocupation: '',
                        experience:
                        @if (auth()->user()->aspirant->resume)
                            {!! auth()->user()->aspirant->resume->sections !!}.experience,
                        @else
                            {!! old('experience') ?: '[]' !!},
                        @endif
                    };
                },
                watch: {
                    experience: function (val) {
                        this.update(val);
                    }
                },
                mounted: function () {
                    this.update(this.experience);
                },
                methods: {
                    add: function () {
                        var input = document.getElementById(this.inputId);

                        if (! this.empty()) {
                            this.experience.push(this.getData());
                            this.reset();
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById(this.id);
                        textarea.value = JSON.stringify(val);
                    },
                    reset: function () {
                        this.company = '';
                        this.from = '';
                        this.to = '';
                        this.ocupation = '';
                    },
                    getData: function () {
                        return {
                            company: this.company,
                            from: this.from,
                            to: this.to,
                            ocupation: this.ocupation,
                        }
                    },
                    empty: function () {
                        if (this.company == ''
                            || this.from == ''
                            || this.to == ''
                            || this.ocupation == '') {
                            return true;
                        }

                        return false;
                    }
                }
            },
            'skills': {
                props: ['title', 'name', 'id'],
                template: `<div class="form-group">
                    <label :for="id">@{{ title }}</label>
                    <textarea hidden class="form-control" :name="name" :id="id"></textarea>
                    <div class="row m-0 pb-2 pt-1 mb-3" style="border:1px solid #eee!important;border-radius:4px;position:relative;" v-for="(skill, index) in skills">
                        <div class="col-sm-6">
                            <label class="small">Categoría</label>
                            <input class="form-control mb-2" :value="skill.company" readonly style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Conocimientos</label>
                            <input class="form-control mb-2" :value="skill.ocupation" readonly style="padding-right:24px;">
                        </div>
                        <i @click="skills.splice(index, 1)" class="material-icons text-danger input-icon" style="right:-8px;top:-8px;cursor:pointer">cancel</i>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="small">Categoría</label>
                            <input v-model="company" @keydown.enter.prevent="" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-6">
                            <label class="small">Conocimientos</label>
                            <input v-model="ocupation" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                        </div>
                        <div class="col-sm-12">
                            <a href="#" class="mb-3 mt-2 btn btn-primary" @click.prevent="add">Agregar<a>
                        </div>
                    </div>
                    @if ($errors->has('skills'))
                        <small class="form-text text-danger">{{ $errors->first('skills') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        company: '',
                        ocupation: '',
                        skills:
                        @if (auth()->user()->aspirant->resume)
                            {!! auth()->user()->aspirant->resume->sections !!}.skills,
                        @else
                            {!! old('skills') ?: '[]' !!},
                        @endif
                    };
                },
                watch: {
                    skills: function (val) {
                        this.update(val);
                    }
                },
                mounted: function () {
                    this.update(this.skills);
                },
                methods: {
                    add: function () {
                        var input = document.getElementById(this.inputId);

                        if (! this.empty()) {
                            this.skills.push(this.getData());
                            this.reset();
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById(this.id);
                        textarea.value = JSON.stringify(val);
                    },
                    reset: function () {
                        this.company = '';
                        this.ocupation = '';
                    },
                    getData: function () {
                        return {
                            company: this.company,
                            ocupation: this.ocupation,
                        }
                    },
                    empty: function () {
                        if (this.company == ''
                            || this.ocupation == '') {
                            return true;
                        }

                        return false;
                    }
                }
            },
            'languages': {
                props: ['title', 'name', 'id', 'input-id'],
                template: `<div class="form-group">
                    <label :for="id">@{{ title }}</label>
                    <textarea hidden class="form-control" :name="name" :id="id"></textarea>
                    <div class="row">
                        <div v-for="(lang, index) in languages" class="col-sm-12">
                            <input class="form-control mb-2" :value="lang" readonly style="padding-right:24px;">
                            <i @click="languages.splice(index, 1)" class="material-icons text-danger input-icon">cancel</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input :id="inputId" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                            <i @click="add" class="material-icons text-success input-icon">add_circle</i>
                        </div>
                    </div>
                    @if ($errors->has('languages'))
                        <small class="form-text text-danger">{{ $errors->first('languages') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        languages:
                        @if (auth()->user()->aspirant->resume)
                            {!! auth()->user()->aspirant->resume->sections !!}.languages,
                        @else
                            {!! old('languages') ?: '[]' !!},
                        @endif
                    };
                },
                watch: {
                    languages: function (val) {
                        this.update(val);
                    }
                },
                mounted: function () {
                    this.update(this.languages);
                },
                methods: {
                    add: function () {
                        var input = document.getElementById(this.inputId);

                        if (input.value != '') {
                            this.languages.push(input.value);
                            input.value = '';
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById(this.id);
                        textarea.value = JSON.stringify(val);
                    }
                }
            }
        }
    });
</script>
