function politicasPrivacidad() {
  Swal.fire({
    icon: "info",
    title: "Politicas de privacidad de SportX",
    text: `
        Actualizada el 25 de Octubre de 2023, efectiva el 22 de octubre de 2024
        Sportex se compromete a proteger la privacidad de sus clientes. Esta política de privacidad explica cómo recopilamos, utilizamos y compartimos la información personal de nuestros clientes.
        
        1. Información que recopilamos
        SportX recopila información personal de nuestros clientes cuando se registran para una cuenta, realizan un pedido. La información personal que recopilamos puede incluir:
        
        Nombre
        Direccion de correo electronico
        Número de teléfono
        2. Cómo utilizamos su información
        SportX utiliza la información personal de nuestros clientes para los siguientes fines:
        
        Para procesar pedidos
        Para mejorar nuestros servicios
        Para enviar boletines informativos
        3. Cómo comparte SportX su información
        SportX no comparte la información personal de nuestros clientes con terceros sin su consentimiento. Sin embargo, podemos compartir su información personal con terceros en los siguientes casos:
        
        Proveedores de servicios externos que nos ayudan a operar nuestro negocio
        Autoridades gubernamentales si estamos obligados a hacerlo por ley.
        4. Protección de su información
        Hace referencia al artículo 16 de la Constitución Política de los Estados Unidos Mexicanos, que establece que toda persona tiene derecho a la protección de sus datos personales. Tomamos medidas de seguridad para proteger su información personal contra el acceso no autorizado, la divulgación, la alteración o la destrucción. Estas medidas incluyen el uso de firewalls, cifrado y contraseñas.
        
        5. Cambios en esta política
        Podemos modificar esta política de privacidad en cualquier momento. Publicaremos cualquier cambio en esta política de privacidad en nuestro sitio web
        
        6. Acuerdo
        Al utilizar el sitio web de Sportex, usted acepta las políticas de privacidad establecidas en este documento.
        
        7. Información que recopilamos
        Sportex recopila información personal de sus clientes cuando se registran para una cuenta o realizan un pedido.
        
        8. Responsable del tratamiento de datos personales
        Esta sección identifica a la empresa que es responsable del tratamiento de los datos personales de los usuarios de SportX.
        
        9. Sus derechos
        De conformidad con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP), usted tiene los siguientes derechos con respecto a su información personal:
        
        Derecho de acceso: Tiene derecho a conocer qué datos personales tenemos sobre usted y cómo los utilizamos.
        Derecho de rectificación: Tiene derecho a corregir cualquier dato personal que sea inexacto o incompleto.
        Derecho de cancelación: Tiene derecho a solicitar que eliminemos sus datos personales.
        Derecho de oposición: Tiene derecho a oponerse al uso de sus datos personales para fines de marketing.
        Derecho a revocar el consentimiento: Tiene derecho a revocar su consentimiento para el tratamiento de sus datos personales.
        Derecho a limitar el tratamiento: Tiene derecho a limitar el tratamiento de sus datos personales.
        Para ejercer estos derechos, puede ponerse en contacto con SportX en [dirección de correo electrónico] o [número de teléfono]`,
    footer: "<p>SportX</p>",
  }).then((result) => {
    if (result.value) {
      terminosCondiciones();
    }
  });
}

function terminosCondiciones() {
  Swal.fire({
    icon: "info",
    title: "Terminos y condiciones de SportX",
    text: `
  Actualizada el 22 de Octubre de 2023, efectiva el 22 de octubre de 2024
  Sportex es una empresa que vende equipos deportivos en línea. Estos términos y condiciones rigen el uso del sitio web y la aplicación de Sportex.
  
  1. Alcance
  Estos términos y condiciones se aplican a todos los usuarios del sitio web y la aplicación de Sportex, incluidos los visitantes, los clientes y los usuarios registrados.
  
  2. Modificaciones
  Sportex puede modificar estos términos y condiciones en cualquier momento. Cualquier cambio en estos términos y condiciones se publicará en el sitio web y la aplicación de Sportex
  
  3. Aceptación
  Al utilizar el sitio web o la aplicación de Sportex, usted acepta estos términos y condiciones.
  
  4. Derechos de propiedad intelectual
  Todo el contenido del sitio web y la aplicación de Sportex, incluidos los textos, las imágenes, los logotipos y el código, es propiedad de Sportex o de sus socios. Está prohibido copiar, distribuir, modificar o utilizar el contenido del sitio web o la aplicación de Sportex sin el consentimiento por escrito de Sportex.
  
  5. Uso del sitio web y la aplicación
  Los usuarios deben utilizar el sitio web y la aplicación de Sportex de manera legal y ética. Está prohibido utilizar el sitio web o la aplicación de Sportex para fines ilegales o dañinos
  
  6. Resolución de disputas
  Todas las disputas relacionadas con el sitio web o la aplicación de Sportex se resolverán mediante un arbitraje vinculante.
  
  7. Contacto
  Si tiene alguna pregunta o comentario, puede ponerse en contacto con Sportex en [dirección de correo electrónico] o 3141642765.`,
    footer: "<p>SportX</p>",
  });
}

function supportModal() {
  Swal.fire({
    title: "Our Contact Information",
    icon: "info",
    showCancelButton: false,
    showConfirmButton: false,
    footer: `
        <div class="support-section">
            <form id="contactForm">
                <label for="name">Numero de colaborador:</label>
                <input type="text" id="name" name="name" required>
            
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            
                <button type="submit">Enviar Consulta</button>
            </form>
            <hr>
            <div class="support-numbers">
                <h2>Numeros de contacto</h2>
                <p>3141669964</p>
                <p>3141669964</p>
            </div>
            <hr>
            <div class="support-email">
                <h2>Correo de contacto</h2>
                <p>sportX@gmail.com</p>
            </div>
            <hr>
            <div class="support-hours">
                <h2>Horario de Atencion</h2>
                <p>9:00 am - 12:00 pm</p>
            </div>
        </div>
        `,
  });
}

const d = document;

d.addEventListener("DOMContentLoaded", (e) => {
  d.addEventListener("click", (e) => {
    if (e.target.matches("#terminos")) {
      terminosCondiciones();
    }
    if (e.target.matches("#politicas")) {
      politicasPrivacidad();
    }
    if (e.target.matches("#support")) {
      supportModal();
    }
  });
});
