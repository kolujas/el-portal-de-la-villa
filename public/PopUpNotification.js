let PopUpNotification = {
    /** @var {HTMLElement} - PopUp Notification HTML element. */
    PopUp: null,
    /** @var {HTMLElement} - Closer button. */
    btnCloser: null,
    /** PopUp Notification loader */
    load(){
		this.PopUp = document.querySelector('.popup-notification');
        this.btnCloser =document.querySelector('.popup-notification .popup-notification-closer');
        this.open();
    },
    /**
     * Check if there is PopUp Notification.
     * @return {boolean}
     */
    hasPopUp(){
        if(document.querySelector('.popup-notification')){
            return true;
        }else{
            return false;
        }
    },
    /** Open the PopUp Notification. */
	open(){
        this.PopUp.classList.remove('closed');
        this.PopUp.classList.add('opened');
        
		this.btnCloser.addEventListener('click', function(e){
			e.preventDefault();
			PopUpNotification.close();
		});
    },
    /** Close the PopUp Notification. */
    close(){
        this.PopUp.classList.remove('opened');
        this.PopUp.classList.add('closed');
	},
};

document.addEventListener('DOMContentLoaded', function(){
    if(PopUpNotification.hasPopUp()){
        PopUpNotification.load();
    }
});