<script type="text/javascript">
    new Vue({
        el: '#sectionsApp',
        components: {
            'education': {
                props: ['title', 'name', 'id', 'input-id'],
                template: `<div class="form-group">
                    <label :for="id">@{{ title }}</label>
                    <textarea hidden class="form-control" :name="name" :id="id"></textarea>
                    <div class="row">
                        <div v-for="(edu, index) in education" class="col-sm-12">
                            <input class="form-control mb-2" :value="edu" readonly style="padding-right:24px;">
                            <i @click="education.splice(index, 1)" class="material-icons text-danger input-icon">close</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input :id="inputId" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                            <i @click="add" class="material-icons text-success input-icon">add</i>
                        </div>
                    </div>
                    @if ($errors->has('education'))
                        <small class="form-text text-danger">{{ $errors->first('education') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        education: []
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

                        if (input.value != '') {
                            this.education.push(input.value);
                            input.value = '';
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById(this.id);
                        textarea.value = JSON.stringify(val);
                    }
                }
            },
            'experience': {
                props: ['title', 'name', 'id', 'input-id'],
                template: `<div class="form-group">
                    <label :for="id">@{{ title }}</label>
                    <textarea hidden class="form-control" :name="name" :id="id"></textarea>
                    <div class="row">
                        <div v-for="(exp, index) in experience" class="col-sm-12">
                            <input class="form-control mb-2" :value="exp" readonly style="padding-right:24px;">
                            <i @click="experience.splice(index, 1)" class="material-icons text-danger input-icon">close</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input :id="inputId" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                            <i @click="add" class="material-icons text-success input-icon">add</i>
                        </div>
                    </div>
                    @if ($errors->has('experience'))
                        <small class="form-text text-danger">{{ $errors->first('experience') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        experience: []
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

                        if (input.value != '') {
                            this.experience.push(input.value);
                            input.value = '';
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById(this.id);
                        textarea.value = JSON.stringify(val);
                    }
                }
            },
            'skills': {
                props: ['title', 'name', 'id', 'input-id'],
                template: `<div class="form-group">
                    <label :for="id">@{{ title }}</label>
                    <textarea hidden class="form-control" :name="name" :id="id"></textarea>
                    <div class="row">
                        <div v-for="(skill, index) in skills" class="col-sm-12">
                            <input class="form-control mb-2" :value="skill" readonly style="padding-right:24px;">
                            <i @click="skills.splice(index, 1)" class="material-icons text-danger input-icon">close</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input :id="inputId" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                            <i @click="add" class="material-icons text-success input-icon">add</i>
                        </div>
                    </div>
                    @if ($errors->has('skills'))
                        <small class="form-text text-danger">{{ $errors->first('skills') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        skills: []
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

                        if (input.value != '') {
                            this.skills.push(input.value);
                            input.value = '';
                        }
                    },
                    update: function (val) {
                        var textarea = document.getElementById(this.id);
                        textarea.value = JSON.stringify(val);
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
                            <i @click="languages.splice(index, 1)" class="material-icons text-danger input-icon">close</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input :id="inputId" @keydown.enter.prevent="add" class="form-control" style="padding-right:24px;">
                            <i @click="add" class="material-icons text-success input-icon">add</i>
                        </div>
                    </div>
                    @if ($errors->has('languages'))
                        <small class="form-text text-danger">{{ $errors->first('languages') }}</small>
                    @endif
                </div>`,
                data: function () {
                    return {
                        languages: []
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
