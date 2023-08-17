import {
    defineAbility
} from '@casl/ability';
import Cookie from "js-cookie";

const permisionsByRole = {
    "1": [
        'action_Admin',
        'action_Admin Petugas',
        'action_Admin Petugas Pemimpin',

    ],
    "2": [
        'action_Petugas',
        'action_Admin Petugas',
        'action_Admin Petugas Pemimpin',
        'action_Petugas Wakasek Guru'
    ],
    "3": [
        'action_Pemimpin',
        'action_Admin Petugas Pemimpin'
    ],
    "4": [
        'action_Wakasek',
        'action_Petugas Wakasek Guru'

    ],
    "5": [
        'action_Guru',
        'action_Petugas Wakasek Guru'

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
