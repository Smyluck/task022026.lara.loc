import { RouterProps } from "ziggy-js";

declare global {
    var route: (
        name: string,
        params?: any,
        absolute?: boolean,
        config?: RouterProps,
    ) => string;
}

export {};
