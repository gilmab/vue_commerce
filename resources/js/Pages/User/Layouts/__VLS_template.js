import Header from './Header.vue';
import Footer from './Footer.vue';
import Hero from './Hero.vue';
import { __VLS_internalComponent, __VLS_componentsOption, __VLS_name } from './UserLayouts.vue';

export function __VLS_template() {
let __VLS_ctx!: InstanceType<__VLS_PickNotAny<typeof __VLS_internalComponent, new () => {}>> & {};
/* Components */
let __VLS_otherComponents!: NonNullable<typeof __VLS_internalComponent extends { components: infer C; } ? C : {}> & typeof __VLS_componentsOption;
let __VLS_own!: __VLS_SelfComponent<typeof __VLS_name, typeof __VLS_internalComponent & (new () => { $slots: typeof __VLS_slots; })>;
let __VLS_localComponents!: typeof __VLS_otherComponents & Omit<typeof __VLS_own, keyof typeof __VLS_otherComponents>;
let __VLS_components!: typeof __VLS_localComponents & __VLS_GlobalComponents & typeof __VLS_ctx;
/* Style Scoped */
type __VLS_StyleScopedClasses = {};
let __VLS_styleScopedClasses!: __VLS_StyleScopedClasses | keyof __VLS_StyleScopedClasses | (keyof __VLS_StyleScopedClasses)[];
/* CSS variable injection */
/* CSS variable injection end */
let __VLS_resolvedLocalAndGlobalComponents!: {} &
__VLS_WithComponent<'Header', typeof __VLS_localComponents, "Header", "Header", "Header"> &
__VLS_WithComponent<'Hero', typeof __VLS_localComponents, "Hero", "Hero", "Hero"> &
__VLS_WithComponent<'Footer', typeof __VLS_localComponents, "Footer", "Footer", "Footer">;
__VLS_components.Header; __VLS_components.Header;
// @ts-ignore
[Header, Header,];
__VLS_components.Hero; __VLS_components.Hero;
// @ts-ignore
[Hero, Hero,];
__VLS_components.Footer; __VLS_components.Footer;
// @ts-ignore
[Footer, Footer,];
{
const __VLS_0 = ({} as 'Header' extends keyof typeof __VLS_ctx ? { 'Header': typeof __VLS_ctx.Header; } : typeof __VLS_resolvedLocalAndGlobalComponents).Header;
const __VLS_1 = __VLS_asFunctionalComponent(__VLS_0, new __VLS_0({ ...{}, }));
({} as { Header: typeof __VLS_0; }).Header;
({} as { Header: typeof __VLS_0; }).Header;
const __VLS_2 = __VLS_1({ ...{}, }, ...__VLS_functionalComponentArgsRest(__VLS_1));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_0, typeof __VLS_2> & Record<string, unknown>) => void)({ ...{}, });
const __VLS_3 = __VLS_pickFunctionalComponentCtx(__VLS_0, __VLS_2)!;
let __VLS_4!: __VLS_NormalizeEmits<typeof __VLS_3.emit>;
}
{
const __VLS_5 = ({} as 'Hero' extends keyof typeof __VLS_ctx ? { 'Hero': typeof __VLS_ctx.Hero; } : typeof __VLS_resolvedLocalAndGlobalComponents).Hero;
const __VLS_6 = __VLS_asFunctionalComponent(__VLS_5, new __VLS_5({ ...{}, }));
({} as { Hero: typeof __VLS_5; }).Hero;
({} as { Hero: typeof __VLS_5; }).Hero;
const __VLS_7 = __VLS_6({ ...{}, }, ...__VLS_functionalComponentArgsRest(__VLS_6));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_5, typeof __VLS_7> & Record<string, unknown>) => void)({ ...{}, });
const __VLS_8 = __VLS_pickFunctionalComponentCtx(__VLS_5, __VLS_7)!;
let __VLS_9!: __VLS_NormalizeEmits<typeof __VLS_8.emit>;
}
{
const __VLS_10 = ({} as 'Slot' extends keyof typeof __VLS_ctx ? { 'slot': typeof __VLS_ctx.Slot; } : 'slot' extends keyof typeof __VLS_ctx ? { 'slot': typeof __VLS_ctx.slot; } : typeof __VLS_resolvedLocalAndGlobalComponents).slot;
const __VLS_11 = __VLS_asFunctionalComponent(__VLS_10, new __VLS_10({ ...{}, }));
const __VLS_12 = __VLS_11({ ...{}, }, ...__VLS_functionalComponentArgsRest(__VLS_11));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_10, typeof __VLS_12> & Record<string, unknown>) => void)({ ...{}, });
var __VLS_13 = {};
}
{
const __VLS_14 = ({} as 'Footer' extends keyof typeof __VLS_ctx ? { 'Footer': typeof __VLS_ctx.Footer; } : typeof __VLS_resolvedLocalAndGlobalComponents).Footer;
const __VLS_15 = __VLS_asFunctionalComponent(__VLS_14, new __VLS_14({ ...{}, }));
({} as { Footer: typeof __VLS_14; }).Footer;
({} as { Footer: typeof __VLS_14; }).Footer;
const __VLS_16 = __VLS_15({ ...{}, }, ...__VLS_functionalComponentArgsRest(__VLS_15));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_14, typeof __VLS_16> & Record<string, unknown>) => void)({ ...{}, });
const __VLS_17 = __VLS_pickFunctionalComponentCtx(__VLS_14, __VLS_16)!;
let __VLS_18!: __VLS_NormalizeEmits<typeof __VLS_17.emit>;
}
if (typeof __VLS_styleScopedClasses === 'object' && !Array.isArray(__VLS_styleScopedClasses)) {
}
var __VLS_slots!: {
default?(_: typeof __VLS_13): any;
};
return __VLS_slots;
}
