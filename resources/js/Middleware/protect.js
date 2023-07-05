import Cookies from "js-cookie";

export function checkRoles(allowRoles) {
    return function (to, from, next) {
        const user = JSON.parse(Cookies.get('user'));
        const roleId = user.data.idRole || null;
        const canAccess = roleId && allowRoles.includes(roleId);
        canAccess ? next() : next({
            name: 'Dashboard'
        });
    };
}


export const roles = {
    admin: '1',
    petugas: '2',
    pemimpin: '3',
    wakasek: '4',
    adminPetugas: ['1', '2'],

};
