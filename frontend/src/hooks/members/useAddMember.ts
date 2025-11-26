import { createMember, CreateMemberPayload } from "@/services/member";
import { useMemberCivilStatus, useMemberDateOfBirth, useMemberFirstName, useMemberGender, useMemberLastName, useMemberMiddleName, useMemberPlaceOfBirth, useMemberReligion } from "@/stores/memberStore/memberStore";

export const useAddMember = () => {

    const firstName = useMemberFirstName();
    const lastName = useMemberLastName();
    const middleName = useMemberMiddleName();
    const dateOfBirth = useMemberDateOfBirth();
    const placeOfBirth = useMemberPlaceOfBirth();
    const religion = useMemberReligion();
    const gender = useMemberGender();
    const civilStatus = useMemberCivilStatus();

    return async () => {
        const payload: CreateMemberPayload = {
            first_name: firstName,
            last_name: lastName,
            middle_name: middleName,
            date_of_birth: dateOfBirth,
            place_of_birth: placeOfBirth,
            religion,
            gender,
            civil_status: civilStatus
        };
        const response = await createMember(payload);
        return response;
    }
}