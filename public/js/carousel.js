document.addEventListener('DOMContentLoaded', (event) => {
    let leftControl = document.querySelector('.fa-arrow-left');
    let rightControl = document.querySelector('.fa-arrow-right');
    let articleItems = [].slice.call(document.getElementsByClassName('article-item'));
    let articleActive;

    if(articleItems) {
        let articleActive = () => {
            let articlesToShow = 4;
            for(let i = 0; i <= articlesToShow - 1; i++){
                articleItems[i].classList.add('article-active');
            }
        }
    }
    

    let addDataIndex = () => {
        let articlesLength = articleItems.length;
        for(let i = 0; i <= articlesLength - 1; i++){
            articleItems[i].setAttribute('data-articleIndex', i);
        }
    }

    addDataIndex();
    articleActive();
    

    let checkArticles = () => {
        if(articleItems.length <= 0 ) {
            console.log("not enough articles");
            return false;
        }
    }

    let articlesNumber = () => {
        let value = articleItems.length;
        return value;
    }

    leftControl.addEventListener('click', () => {

       
        
    })
    rightControl.addEventListener('click', () => {
        let check = checkArticles();
        if (check !== false) {
            let currentActive = articleItems.filter((item) => {
                return item.classList.contains('article-active')
            });
            let currentActiveLength = currentActive.length;
            let firstArticleIndex = currentActive[0].dataset.articleindex;
            let lastArticleIndex = currentActive[currentActiveLength - 1].dataset.articleindex;
            let articlesToShow = 4;
            let checkEnd = (articleItems.length - 1) - lastArticleIndex;
            if(checkEnd > 0) {
                for(let i = 0; i <= articlesToShow - 1; i++){
                    articleItems[parseInt(firstArticleIndex) + i].classList.remove('article-active');
                }
                 for(let i = 1; i <= (checkEnd > 4 ? articlesToShow : checkEnd); i++){
                    articleItems[parseInt(lastArticleIndex) + i].classList.add('article-active', 'animated', 'fadeIn');
                 }
            }     
        }        
    });
    leftControl.addEventListener('click', () => {
        let check = checkArticles();
        if(check !== false) {
            let currentActive = articleItems.filter((item) => {
                return item.classList.contains('article-active')
            });
            let currentActiveLength = currentActive.length;
            let firstArticleIndex = currentActive[0].dataset.articleindex;
            let lastArticleIndex = currentActive[currentActiveLength - 1].dataset.articleindex;
            let articlesToShow = 4;
            let checkEnd = (articleItems.length - 1) - lastArticleIndex;
            let loopTimes = (lastArticleIndex - firstArticleIndex) ;
            if(firstArticleIndex > 0) {
                for(let i = 0; i <= loopTimes ; i++){
                    currentActive[i].classList.remove('article-active', 'animated', 'fadeIn');
                }
                 for(let i = 1; i <= articlesToShow; i++){
                    articleItems[parseInt(firstArticleIndex) - i].classList.add('article-active', 'animated', 'fadeIn');
                }
            }
        }
    })
})