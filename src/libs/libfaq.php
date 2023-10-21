
<?php

function generateFAQItem($question, $answer) {
    return '
    <div class="faq-container">
        <div class="faq-item">
            <div class="faq-question">
                ' . htmlspecialchars($question) . '
                <i class="icon fas fa-chevron-right"></i>
            </div>
            <div class="faq-answer">
                ' . htmlspecialchars($answer) . '
            </div>
        </div>
    </div>
    ';
}
?>

<script>
function initFAQInteraction() {
    $('.faq-question').on('click', function() {
        const answer = $(this).next('.faq-answer');
        
        if(answer.is(':visible')) {
            answer.slideUp(100);
            $(this).parent().removeClass('active');
        } else {
            // Сначала закрываем все другие ответы
            $('.faq-answer:visible').slideUp(300);
            $('.faq-item.active').removeClass('active');

            answer.slideDown(300);
            $(this).parent().addClass('active');
        }
    });
}
</script>