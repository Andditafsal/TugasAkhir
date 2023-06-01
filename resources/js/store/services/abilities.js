import {
    defineAbility
} from '@casl/ability';
import Cookie from "js-cookie";

const permisionsByRole = {
    "1": [
        'action_Admin'
    ],

}
export default defineAbility(can => {
    if (Cookie.get('user') !== undefined) {
        const user = JSON.parse(Cookie.get('user'))
        const roles = user.data.idRole
        const permisions = permisionsByRole[roles] || [];
        for (const permision of permisions) {
            const [actions, resource] = permision.split('_')
            can([actions], resource)
        }
    }
});
