import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faGlobeAmericas } from '@fortawesome/free-solid-svg-icons'
import { faArrowAltCircleLeft } from '@fortawesome/free-solid-svg-icons'
import { faSignInAlt } from '@fortawesome/free-solid-svg-icons'
import { faCircleNotch } from '@fortawesome/free-solid-svg-icons'
import { faCheck } from '@fortawesome/free-solid-svg-icons'


library.add(
    faGlobeAmericas,
    faArrowAltCircleLeft,
    faSignInAlt,
    faCircleNotch,
    faCheck
);

Vue.component('icon', FontAwesomeIcon);