<template>
    <div class="card card-statistics mx-auto card-plus" @click="openForm">
        <img :src="'/images/plus.svg'" class="card-img-plus" alt="plus">
        <div class="modal fade" id="createProjectForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ trans.get('project.create-project') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="projectTitle"
                                                     type="text"
                                                     :label="trans.get('project.title')"
                                                     v-model="form.titleInput"
                                                     :errors="hasErrors('title')"></v-input>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-markdown-editor id="projectContent"
                                                               :label="trans.get('project.content')"
                                                               v-model="form.contentInput"
                                                               :errors="hasErrors('content')"></v-markdown-editor>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-lg-6">
                                            <v-datepicker id="startDate"
                                                          :label="trans.get('project.start_at')"
                                                          v-model="form.startAtInput"
                                                          :errors="hasErrors('start_at')"></v-datepicker>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <v-datepicker id="endDate"
                                                          :label="trans.get('project.end_at')"
                                                          v-model="form.endAtInput"
                                                          :errors="hasErrors('end_at')"></v-datepicker>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="projectType"
                                                     type="text"
                                                     :label="trans.get('project.type')"
                                                     v-model="form.typeInput"
                                                     :errors="hasErrors('type_id')"></v-input>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <div>
                                                <label>{{ trans.get('project.add-image') }}</label>
                                                <br>
                                                <croppa v-model="form.imagePicker"
                                                        :prevent-white-space="true"
                                                        :reverse-scroll-to-zoom="true"
                                                        :placeholder="trans.get('common.choose-file')"
                                                        :placeholder-font-size="16"></croppa>
                                                <div class="mt-1">
                                                    <button @click="form.imagePicker.rotate()"
                                                            type="button"
                                                            class="btn btn-info btn-xs">
                                                        画像回転
                                                    </button>
                                                </div>
                                                <div class="invalid-feedback" v-for="error in hasErrors('image')" style="display: block">
                                                    {{ error }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="passwordInput"
                                                     type="password"
                                                     :label="trans.get('project.password')"
                                                     v-model="form.passwordInput"
                                                     :errors="hasErrors('password')"></v-input>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-12">
                                            <v-input id="passwordConfirmationInput"
                                                     type="password"
                                                     :label="trans.get('project.password_confirmation')"
                                                     v-model="form.passwordConfirmationInput"></v-input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeForm">{{ trans.get('project.cancel') }}</button>
                        <button type="button" class="btn btn-primary" @click="submit">{{ trans.get('project.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VInput from "../forms/VInput";
    import VMarkdownEditor from "../forms/VMarkdownEditor";
    import VDatepicker from "../forms/VDatepicker";
    import Croppa from 'vue-croppa'
    import DateFormat from "../system/DateFormat";
    import ErrorHandler from "../system/ErrorHandler";
    import Router from "../system/Router";
    export default {
        name: "CreateProjectBlock",
        mixins: [DateFormat, ErrorHandler, Router],
        components: {croppa: Croppa.component, VDatepicker, VMarkdownEditor, VInput},
        data: function () {
            return {
                form: {
                    titleInput: null,
                    contentInput: null,
                    typeInput: null,
                    passwordInput: null,
                    passwordConfirmationInput: null,
                    startAtInput: new Date(),
                    endAtInput: new Date(),
                    imagePicker: {}
                }
            }
        },
        methods: {
            openForm: function () {
                $('#createProjectForm').modal('show')
            },
            closeForm: function () {
                this.clearErrors();
                this.resetForm();
                $('#createProjectForm').modal('hide');
            },
            submit: async function () {
                this.showIndicator();
                let formData = new FormData();
                formData.append('image', await this.form.imagePicker.promisedBlob('image/jpeg', 0.8));
                formData.append('title', this.form.titleInput);
                formData.append('content', this.form.contentInput);
                formData.append('start_at', this.dateFormat(this.form.startAtInput, 'YYYY-MM-DD'));
                formData.append('end_at', this.dateFormat(this.form.endAtInput, 'YYYY-MM-DD'));
                formData.append('type_id', this.form.typeInput);
                formData.append('password', this.form.passwordInput);
                formData.append('password_confirmation', this.form.passwordConfirmationInput);

                let config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };

                axios.post(this.route.projects.store, formData, config)
                    .then(response => {
                        if (response.data.status === 'OK') {
                            this.$parent.loadData();
                            this.closeForm();
                            this.showSuccessPopup(response.data.messages);
                        }
                        if (response.data.status === 'NG') {
                            alert(response.data.messages);
                        }
                    })
                    .catch(error => {
                        this.handleErrorStatusCodes(error);
                    });
            },
            resetForm: function () {
                this.form.titleInput = '';
                this.form.contentInput = '';
                this.form.typeInput = '';
                this.form.passwordInput = '';
                this.form.passwordConfirmationInput = '';
                this.form.startAtInput = new Date();
                this.form.endAtInput = new Date();
                this.form.imagePicker.remove();
            }
        }
    }
</script>