class CreateTodo {
    constructor() {
        this.csrf = document.querySelector('meta[name="csrf-token"]').content;
    }

    create_todo() {
        this.formHtml = '<form method="POST" action="/todos" novalidate>\
                            <div class="form-group row">\
                                <label for="title" class="col-md-12 col-form-label">Title</label>\
                                <div class="col-md-12">\
                                    <input id="title" type="text" class="form-control" name="title"\
                                        value="title" autocomplete="title">\
                                </div>\
                            </div>\
                            <div class="form-group row">\
                                <label for="description" class="col-md-12 col-form-label">Description</label>\
                                <div class="col-md-12">\
                                    <textarea name="description" class="form-control"\
                                        id="description" cols="30" rows="10">description</textarea>\
                                </div>\
                            </div>\
                            <div class="form-group form-check">\
                                <input type="checkbox" class="form-check-input" id="completed" name="completed">\
                                    <label class="form-check-label" for="completed">Completed</label>\
                            </div>\
                            <input type="hidden" name="_token" value="' + this.csrf + '">\
                            <button type="submit" class="btn btn-primary">Submit</button>\
                        </form>'
        document.getElementById('createtodo').innerHTML = obj.formHtml;
    }
}

let obj = new CreateTodo();
obj.create_todo();

