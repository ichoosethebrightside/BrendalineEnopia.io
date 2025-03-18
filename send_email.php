<form id="contactForm">
    <div class="fields">
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required />
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required />
        </div>
        <div class="field">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="3" required></textarea>
        </div>
    </div>
    <ul class="actions">
        <li><button type="submit">Send Message</button></li>
    </ul>
</form>

<div id="responseMessage" style="display: none; padding: 10px; margin-top: 10px; border: 1px solid #ccc; background: #f9f9f9;">
</div>

<script>
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent actual form submission
    
    document.getElementById("responseMessage").innerHTML = `
        <strong>Thank you so much for reaching out! 😊</strong><br><br>
        We truly appreciate your time and effort in contacting us. Your message is important, and we are grateful for your interest. 
        Rest assured that we will carefully review your message and get back to you as soon as possible.<br><br>
        In the meantime, feel free to explore more of our content. Wishing you a wonderful day ahead! 🌸✨<br><br>
        <strong>Best regards,<br>The Team</strong>
    `;
    
    document.getElementById("responseMessage").style.display = "block";  
});
</script>
