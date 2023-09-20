class TodosList {
    constructor() {
        this.todos = JSON.parse(document.getElementById('todoslist').getAttribute('todos'));
        this.csrf = document.querySelector('meta[name="csrf-token"]').content;
    }

    show_list() {
        if (this.todos.length > 0) {
            this.listHtml = '<table class="table table-sm mb-0 penultimate-column-right">\
                                <tbody>';

            for (let key in this.todos) {
                console.log(key);
                let todo = this.todos[key];
                this.listHtml += '<tr><td scope="col" style="width:80%">';
                if (this.completed) {
                    this.listHtml += '<del><a href="/todos/' + todo.id + '">' + todo.title + '</a></del>';
                }
                else {
                    this.listHtml += '<a href="/todos/' + todo.id + '">' + todo.title + '</a>';
                }

                this.listHtml += '</td>\
                <td>\
                <a href="/todos/' + todo.id + '/edit" class="btn btn-success"><i class="far fa-edit text-white">\
                    Edit</a></i>\
                    </td>\
                <td>\
                    <form action="/todos/' + todo.id + '" method="POST">\
                        <input type="hidden" name="_method" value="DELETE" >\
                        <input type="hidden" name="_token" value="' + this.csrf + '">\
                        <input type="submit" class="btn btn-danger" value="Delete">\
                    </form>\
                </td>\
                </tr>';
            }
            this.listHtml += '</tbody></table> ';
            document.getElementById('todoslist').innerHTML = this.listHtml;
        }
    }
}

let obj = new TodosList();
obj.show_list();