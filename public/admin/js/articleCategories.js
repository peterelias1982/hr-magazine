const author = document.getElementById('author-section');
const source = document.getElementById('source-section');
const youtube = document.getElementById('youtube-section');

let categoryData = null;

for(var i=0; i < categories.length ; i++) {
    if(categories[i]['id'] == document.getElementById('category').value) {
        categoryData = categories[i]
        break
    }
}

changeFormDisplay(categoryData);

document.getElementById('category').addEventListener('change', function(cat) {
    for(var i=0; i < categories.length ; i++)
    {
        if(categories[i]['id'] == cat.target.value) {
            categoryData = categories[i]
            break
        }
    }

    changeFormDisplay(categoryData);
});

function changeFormDisplay(data) {
    function disableInputs() {
        author.classList.add('d-none');
        source.classList.add('d-none');
        youtube.classList.add('d-none');

        author.querySelectorAll('input, select, textarea').forEach(function(elem){
            elem.disabled = true
        });
        source.querySelectorAll('input, select, textarea').forEach(function(elem){
            elem.disabled = true
        });
        youtube.querySelectorAll('input, select, textarea').forEach(function(elem){
            elem.disabled = true
        });
    }

    if(data) {
        disableInputs();

        if(data['hasAuthor']) {
            author.classList.remove('d-none');
            author.querySelectorAll('input, select, textarea').forEach(function(elem){
                elem.disabled = false
            });
        }

        if(data['hasYoutubeLink']) {
            youtube.classList.remove('d-none');
            youtube.querySelectorAll('input, select, textarea').forEach(function(elem){
                elem.disabled = false
            });
        }

        if(data['hasSource']) {
            source.classList.remove('d-none');
            source.querySelectorAll('input, select, textarea').forEach(function(elem){
                elem.disabled = false
            });
        }

    } else {
        disableInputs();
    }
}
