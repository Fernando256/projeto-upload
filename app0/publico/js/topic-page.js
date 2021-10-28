let comment = document.querySelector('#comment').innerText;
let editComment = document.querySelector('.edit-comment');
console.log(comment);

document.getElementById('edit-comment').addEventListener('click', () => {
    document.querySelector('.view-comment').style.display = 'none';
    editComment.style.display = 'inline';
});

document.querySelector('.cancel-button').addEventListener('click', (e) => {
    e.preventDefault();
    document.querySelector('.view-comment').style.display = 'inline';
    editComment.style.display = 'none';
});