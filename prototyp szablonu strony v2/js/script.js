     function tekst(){
            const actualBtn = document.getElementById('label');

            const fileChosen = document.getElementById('file-chosen');
            
            actualBtn.addEventListener('change', function(){
            fileChosen.textContent = this.files[0].name
            })
            }
      