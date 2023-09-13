import { componentDef } from "@spryker-oryx/utilities";

export const blankComponent = componentDef({
    name: "oryx-blank",
    impl: () => import("./blank.component.js").then((m) => m.BlankComponent),
});